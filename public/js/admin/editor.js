$(function() {
    var theEditor;
    const customColorPalette = [{
            color: 'hsl(4, 90%, 58%)',
            label: 'Red'
        },
        {
            color: 'hsl(340, 82%, 52%)',
            label: 'Pink'
        },
        {
            color: 'hsl(291, 64%, 42%)',
            label: 'Purple'
        },
        {
            color: 'hsl(262, 52%, 47%)',
            label: 'Deep Purple'
        },
        {
            color: 'hsl(231, 48%, 48%)',
            label: 'Indigo'
        },
        {
            color: 'hsl(207, 90%, 54%)',
            label: 'Blue'
        },

        // ...
    ];

    if ($('.ckeditor').length > 0) {
        var allEditors = document.querySelectorAll('.ckeditor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i], {
                    fontSize: {
                        options: [
                            8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 36
                        ]
                    },
                    alignment: {
                        options: [{
                                name: 'left',
                                className: 'text-left'
                            },
                            {
                                name: 'center',
                                className: 'text-center'
                            },
                            {
                                name: 'right',
                                className: 'text-right'
                            }
                        ]
                    },
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'undo',
                            'redo',
                            '|',
                            'bold',
                            'underline',
                            'italic',
                            'alignment',
                            '|',
                            'link',
                            'bulletedList',
                            'numberedList',
                            'horizontalLine',
                            '|',
                            'indent',
                            'outdent',
                            '|',
                            'imageInsert',
                            'insertTable',
                            'blockQuote',
                            '|',
                            'fontSize',
                            'fontColor',
                            'fontBackgroundColor',
                            'sourceEditing',
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn', 'tableRow', 'mergeTableCells',
                            'tableProperties', 'tableCellProperties'
                        ],

                        // Set the palettes for tables.
                        tableProperties: {
                            borderColors: customColorPalette,
                            backgroundColors: customColorPalette
                        },

                        // Set the palettes for table cells.
                        tableCellProperties: {
                            borderColors: customColorPalette,
                            backgroundColors: customColorPalette
                        }
                    },
                    link: {
                        decorators: {
                            openInNewTab: {
                                mode: 'manual',
                                label: 'Open in a new tab',
                                attributes: {
                                    target: '_blank',
                                    rel: 'noopener noreferrer'
                                }
                            }
                        }
                    },
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            },
                            {
                                model: 'heading3',
                                view: 'h3',
                                title: 'Heading 3',
                                class: 'ck-heading_heading3'
                            },
                            {
                                model: 'heading4',
                                view: 'h4',
                                title: 'Heading 4',
                                class: 'ck-heading_heading4'
                            },
                            {
                                model: 'heading5',
                                view: 'h5',
                                title: 'Heading 5',
                                class: 'ck-heading_heading5'
                            },
                            {
                                model: 'heading6',
                                view: 'h6',
                                title: 'Heading 6',
                                class: 'ck-heading_heading6'
                            }
                        ]
                    },
                    language: 'en',
                    image: {
                        toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full',
                            'imageStyle:alignRight', 'linkImage'
                        ],

                        styles: [
                            // This option is equal to a situation where no style is applied.
                            'full',

                            // This represents an image aligned to the left.
                            'alignLeft',

                            // This represents an image aligned to the right.
                            'alignRight'
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },
                    licenseKey: '',

                })
                .then(editor => {
                    window.editor = editor;
                    theEditor = editor; // Save for later use.
                })
                .catch(error => {
                    console.error('Oops, something went wrong!');
                    console.error(
                        'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                    );
                    console.warn('Build id: hra3xuxl2r9k-ry32t8qaougf');
                    console.error(error);
                });
        }
    }
});