import {
    ClassicEditor,
    AccessibilityHelp,
    Alignment,
    Autoformat,
    AutoLink,
    Autosave,
    BlockQuote,
    Bold,
    CloudServices,
    Code,
    CodeBlock,
    Essentials,
    FindAndReplace,
    FontBackgroundColor,
    FontColor,
    FontFamily,
    FontSize,
    FullPage,
    GeneralHtmlSupport,
    Heading,
    Highlight,
    HorizontalLine,
    HtmlComment,
    HtmlEmbed,
    ImageBlock,
    ImageCaption,
    ImageInline,
    ImageInsert,
    ImageInsertViaUrl,
    ImageResize,
    ImageStyle,
    ImageTextAlternative,
    ImageToolbar,
    ImageUpload,
    Indent,
    IndentBlock,
    Italic,
    Link,
    LinkImage,
    List,
    ListProperties,
    Paragraph,
    RemoveFormat,
    SelectAll,
    ShowBlocks,
    SimpleUploadAdapter,
    SourceEditing,
    SpecialCharacters,
    SpecialCharactersArrows,
    SpecialCharactersCurrency,
    SpecialCharactersEssentials,
    SpecialCharactersLatin,
    SpecialCharactersMathematical,
    SpecialCharactersText,
    Strikethrough,
    Style,
    Subscript,
    Superscript,
    Table,
    TableCaption,
    TableCellProperties,
    TableColumnResize,
    TableProperties,
    TableToolbar,
    TextTransformation,
    Underline,
    Undo,
} from "ckeditor5";

const editorConfig = {
    toolbar: {
        items: [
            "undo",
            "redo",
            "|",
            "sourceEditing",
            "showBlocks",
            "|",
            "heading",
            "style",
            "|",
            "fontSize",
            "fontFamily",
            "fontColor",
            "fontBackgroundColor",
            "|",
            "bold",
            "italic",
            "underline",
            "|",
            "link",
            "insertImage",
            "insertTable",
            "highlight",
            "blockQuote",
            "codeBlock",
            "|",
            "alignment",
            "|",
            "bulletedList",
            "numberedList",
            "indent",
            "outdent",
        ],
        shouldNotGroupWhenFull: false,
    },
    plugins: [
        AccessibilityHelp,
        Alignment,
        Autoformat,
        AutoLink,
        Autosave,
        BlockQuote,
        Bold,
        CloudServices,
        Code,
        CodeBlock,
        Essentials,
        FindAndReplace,
        FontBackgroundColor,
        FontColor,
        FontFamily,
        FontSize,
        FullPage,
        GeneralHtmlSupport,
        Heading,
        Highlight,
        HorizontalLine,
        HtmlComment,
        HtmlEmbed,
        ImageBlock,
        ImageCaption,
        ImageInline,
        ImageInsert,
        ImageInsertViaUrl,
        ImageResize,
        ImageStyle,
        ImageTextAlternative,
        ImageToolbar,
        ImageUpload,
        Indent,
        IndentBlock,
        Italic,
        Link,
        LinkImage,
        List,
        ListProperties,
        Paragraph,
        RemoveFormat,
        SelectAll,
        ShowBlocks,
        SimpleUploadAdapter,
        SourceEditing,
        SpecialCharacters,
        SpecialCharactersArrows,
        SpecialCharactersCurrency,
        SpecialCharactersEssentials,
        SpecialCharactersLatin,
        SpecialCharactersMathematical,
        SpecialCharactersText,
        Strikethrough,
        Style,
        Subscript,
        Superscript,
        Table,
        TableCaption,
        TableCellProperties,
        TableColumnResize,
        TableProperties,
        TableToolbar,
        TextTransformation,
        Underline,
        Undo,
    ],
    fontFamily: {
        supportAllValues: true,
    },
    fontSize: {
        options: [10, 12, 14, "default", 18, 20, 22],
        supportAllValues: true,
    },
    heading: {
        options: [
            {
                model: "paragraph",
                title: "Paragraph",
                class: "ck-heading_paragraph",
            },
            {
                model: "heading1",
                view: "h1",
                title: "Heading 1",
                class: "ck-heading_heading1",
            },
            {
                model: "heading2",
                view: "h2",
                title: "Heading 2",
                class: "ck-heading_heading2",
            },
            {
                model: "heading3",
                view: "h3",
                title: "Heading 3",
                class: "ck-heading_heading3",
            },
            {
                model: "heading4",
                view: "h4",
                title: "Heading 4",
                class: "ck-heading_heading4",
            },
            {
                model: "heading5",
                view: "h5",
                title: "Heading 5",
                class: "ck-heading_heading5",
            },
            {
                model: "heading6",
                view: "h6",
                title: "Heading 6",
                class: "ck-heading_heading6",
            },
        ],
    },
    htmlSupport: {
        allow: [
            {
                name: /^.*$/,
                styles: true,
                attributes: true,
                classes: true,
            },
        ],
    },
    image: {
        toolbar: [
            "toggleImageCaption",
            "imageTextAlternative",
            "|",
            "imageStyle:inline",
            "imageStyle:wrapText",
            "imageStyle:breakText",
            "|",
            "resizeImage",
        ],
    },
    link: {
        addTargetToExternalLinks: true,
        defaultProtocol: "https://",
        decorators: {
            toggleDownloadable: {
                mode: "manual",
                label: "Downloadable",
                attributes: {
                    download: "file",
                },
            },
        },
    },
    list: {
        properties: {
            styles: true,
            startIndex: true,
            reversed: true,
        },
    },
    menuBar: {
        isVisible: true,
    },
    placeholder: "Type or paste your content here!",
    style: {
        definitions: [
            {
                name: "Article category",
                element: "h3",
                classes: ["category"],
            },
            {
                name: "Title",
                element: "h2",
                classes: ["document-title"],
            },
            {
                name: "Subtitle",
                element: "h3",
                classes: ["document-subtitle"],
            },
            {
                name: "Info box",
                element: "p",
                classes: ["info-box"],
            },
            {
                name: "Side quote",
                element: "blockquote",
                classes: ["side-quote"],
            },
            {
                name: "Marker",
                element: "span",
                classes: ["marker"],
            },
            {
                name: "Spoiler",
                element: "span",
                classes: ["spoiler"],
            },
            {
                name: "Code (dark)",
                element: "pre",
                classes: ["fancy-code", "fancy-code-dark"],
            },
            {
                name: "Code (bright)",
                element: "pre",
                classes: ["fancy-code", "fancy-code-bright"],
            },
        ],
    },
    table: {
        contentToolbar: [
            "tableColumn",
            "tableRow",
            "mergeTableCells",
            "tableProperties",
            "tableCellProperties",
        ],
    },
    simpleUpload: {
        // The URL that the images are uploaded to.
        uploadUrl: uploadImageRoute,

        // Enable the XMLHttpRequest.withCredentials property.
        withCredentials: true,

        // Headers sent along with the XMLHttpRequest to the upload server.
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    },
};

const miniEditorConfig = {
    toolbar: {
        items: [
            "undo",
            "redo",
            "|",
            "sourceEditing",
            "|",
            "bold",
            "italic",
            "underline",
        ],
        shouldNotGroupWhenFull: false,
    },
    plugins: [
        AccessibilityHelp,
        Alignment,
        Autoformat,
        AutoLink,
        Autosave,
        BlockQuote,
        Bold,
        CloudServices,
        Code,
        CodeBlock,
        Essentials,
        FindAndReplace,
        FontBackgroundColor,
        FontColor,
        FontFamily,
        FontSize,
        FullPage,
        GeneralHtmlSupport,
        Heading,
        Highlight,
        HorizontalLine,
        HtmlComment,
        HtmlEmbed,
        ImageBlock,
        ImageCaption,
        ImageInline,
        ImageInsert,
        ImageInsertViaUrl,
        ImageResize,
        ImageStyle,
        ImageTextAlternative,
        ImageToolbar,
        ImageUpload,
        Indent,
        IndentBlock,
        Italic,
        Link,
        LinkImage,
        List,
        ListProperties,
        Paragraph,
        RemoveFormat,
        SelectAll,
        ShowBlocks,
        SimpleUploadAdapter,
        SourceEditing,
        SpecialCharacters,
        SpecialCharactersArrows,
        SpecialCharactersCurrency,
        SpecialCharactersEssentials,
        SpecialCharactersLatin,
        SpecialCharactersMathematical,
        SpecialCharactersText,
        Strikethrough,
        Style,
        Subscript,
        Superscript,
        Table,
        TableCaption,
        TableCellProperties,
        TableColumnResize,
        TableProperties,
        TableToolbar,
        TextTransformation,
        Underline,
        Undo,
    ],
    heading: {
        options: [
            {
                model: "paragraph",
                title: "Paragraph",
                class: "ck-heading_paragraph",
            },
            {
                model: "heading1",
                view: "h1",
                title: "Heading 1",
                class: "ck-heading_heading1",
            },
            {
                model: "heading2",
                view: "h2",
                title: "Heading 2",
                class: "ck-heading_heading2",
            },
            {
                model: "heading3",
                view: "h3",
                title: "Heading 3",
                class: "ck-heading_heading3",
            },
            {
                model: "heading4",
                view: "h4",
                title: "Heading 4",
                class: "ck-heading_heading4",
            },
            {
                model: "heading5",
                view: "h5",
                title: "Heading 5",
                class: "ck-heading_heading5",
            },
            {
                model: "heading6",
                view: "h6",
                title: "Heading 6",
                class: "ck-heading_heading6",
            },
        ],
    },

    list: {
        properties: {
            styles: true,
            startIndex: true,
            reversed: true,
        },
    },
    placeholder: "Type or paste your content here!",
    style: {
        definitions: [
            {
                name: "Article category",
                element: "h3",
                classes: ["category"],
            },
            {
                name: "Title",
                element: "h2",
                classes: ["document-title"],
            },
            {
                name: "Subtitle",
                element: "h3",
                classes: ["document-subtitle"],
            },
            {
                name: "Info box",
                element: "p",
                classes: ["info-box"],
            },
            {
                name: "Side quote",
                element: "blockquote",
                classes: ["side-quote"],
            },
            {
                name: "Marker",
                element: "span",
                classes: ["marker"],
            },
            {
                name: "Spoiler",
                element: "span",
                classes: ["spoiler"],
            },
            {
                name: "Code (dark)",
                element: "pre",
                classes: ["fancy-code", "fancy-code-dark"],
            },
            {
                name: "Code (bright)",
                element: "pre",
                classes: ["fancy-code", "fancy-code-bright"],
            },
        ],
    },
    table: {
        contentToolbar: [
            "tableColumn",
            "tableRow",
            "mergeTableCells",
            "tableProperties",
            "tableCellProperties",
        ],
    },
};


const ckeditors = document.querySelectorAll(".ckeditor");

ckeditors.forEach(function (ckedit) {
    let ck = ClassicEditor.create(ckedit, editorConfig);
    editors.push(ck);
});

const miniEditors = document.querySelectorAll(".ckeditor-mini");



miniEditors.forEach(function (cktor) {
    let ck = ClassicEditor.create(cktor, miniEditorConfig);
    editors.push(ck);
});

//  CKEDITOR.replace('page_content');
$(".ajax-form-admin").on("submit", function(event){
    event.preventDefault();
    editors.forEach(editor => {
        if (editor instanceof ClassicEditor) { // Change 'ClassicEditor' based on your editor type
            editor.updateSourceElement();
        } else {
            console.warn('Attempted to update non-CKEditor 5 instance:', editor);
        }
    });
    let url = this.action;

    var formData = new FormData(this);
    $.ajax({
        method: "POST",
        data: formData,
        url: url,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function(){
            $(".loader-wrapper").show();
        },
        success: function (response) {
            // console.log(response)
            if (response.status == 1) {
                let url = response.redirect_url;
                notifyBlackToastWithRedirect(response.message,url)
            }else if(response.status == 2){
                notifyBlackToast(response.message)
                $(".loader-wrapper").hide();
            }else if(response.status == 0){
                notifyBlackToast(response.message)
                $(".loader-wrapper").hide();
            }else{
                $(".loader-wrapper").hide();
            }
        },
        error : function (errors) {

            $(".loader-wrapper").hide();
            if($('.correct-tag').length){
                $(".correct-tag").removeClass('d-none');
                setTimeout(function (){
                    $(".correct-tag").addClass('d-none');
                },5000)
            }
            $('html, body').animate({scrollTop:$('.ajax-form-admin').position().top}, 'slow');
            errorsGetNew(errors.responseJSON.errors)

        }
    });
});

function errorsGetNew(errors) {
    $('span.invalid-feedback').remove();
    for (const x in errors) {
        var formGroup = $('.errors[data-id="' + x + '"],input[name="' + x + '"],select[name="' + x + '"],textarea[name="' + x + '"]').parent();
        for (const item in errors[x]) {
            formGroup.append(' <span class="invalid-feedback d-block" role="alert">' + errors[x][item] + '</span>');
        }
    }
}