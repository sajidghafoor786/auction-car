<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Auction;
use App\Models\Bid;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use PDF;
// use Mail;

class CloseExpiredAuctions extends Command
{
    protected $signature = 'auction:close-expired';
    protected $description = 'Close expired auctions and notify users';

    public function handle()
    {
        $now = Carbon::now();

        $expiredAuctions = Auction::where('status', 'active')
            ->where('end_date', '<=', $now)
            ->get();

        foreach ($expiredAuctions as $auction) {
            $auction->status = 'closed';
            $auction->save();

            $highestBid = $auction->bids()->first();

            // Send winner email
            if ($highestBid) {
                $pdf = PDF::loadView('emails.auction_winner_pdf', [
                    'auction' => $auction,
                    'bid' => $highestBid
                ]);

                Mail::send('emails.auction_winner', ['auction' => $auction], function ($message) use ($highestBid, $pdf) {
                    $message->to($highestBid->user->email)
                        ->subject('🎉 Congratulations! You won the auction')
                        ->attachData($pdf->output(), 'auction-details.pdf');
                });

                
                $otherBidders = $auction->bids()->where('user_id', '!=', $highestBid->user_id)->get();

                foreach ($otherBidders as $bid) {
                    Mail::send('emails.auction_loser', ['auction' => $auction], function ($message) use ($bid) {
                        $message->to($bid->user->email)
                            ->subject('Auction Result: You didn’t win this time');
                    });
                }
            }
        }

        $this->info('Expired auctions processed successfully.');    
    }
}
