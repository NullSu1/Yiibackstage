if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.clips = function () {
    return {
        init: function () {
            var items = [
                ['Add Tips', '<section class="tips">' +
                'Want to know how to advertise on Instagram? There are actually a few different options, but this post will help to make sense of it all by showing you how to' +
                'advertise' +
                'on Instagram using each of them. ' +
                '</section><br>'],
                ['Add Title', '<section><h2 class="title-list">Title Name</h2></section><br>'],
                ['Add Title_List', '<section class="title-list-pos" id="title-list1">' +
                '<section style="margin:0 auto;text-align: center;color: #fff;line-height: 49px;background: #ff3d00;width: 192px;height: 49px;font-size: 18px;box-shadow: 0px 7px 7.28px 0.72px rgba(161, 177, 194, 0.4);background-image: -webkit-linear-gradient(90deg, #1c67fc 0%, #1c7cfe 32%, #1c90ff 100%);">' +
                'Title List' +
                '</section>' +
                '</section>' +
                '<section class="end_tag"></section><br>'],
                ['Add redirect', '<section class="redirect" style="width: 100%;border-left: solid #bfe9dc 3px;background-color: #C1FFC1">' +
                '<a href="#" target="_self" textvalue="title">title</a>' +
                '</section><br>'],
                ['Add Table', '<table>' +
                '<thead>' +
                '<tr>' +
                '<th>Features</th>' +
                '<th>GetInsta</th>' +
                '<th>GetInsta</th>' +
                '<th><b>GetInsta</b></th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>' +
                '<tr>' +
                '<td>High Quality - Real & Safe</td>' +
                '<td><i class="check"></i></td>' +
                '<td><i class="check"></i></td>' +
                '<td><i class="check"></i></td>' +
                '</tr>' +
                '<tr>' +
                '<td>High Quality - Real & Safe</td>' +
                '<td></td>' +
                '<td><i class="cross"></i></td>' +
                '<td><i class="check"></i></td>' +
                '</tr>' +
                '</tbody>' +
                '</table><br>'],
                ['download module 1', '<section class="download-type-1"> ' +
                '<h2>GetInsta - Get Free Instagram Followers & Likes</h2> ' +
                '<ul> ' +
                '<li>Free high-quality Instagram followers & likes from 100% real person.</li> ' +
                '<li>Getting followers and also get the same amount of additional free likes.</li> ' +
                '<li>Instant delivery guaranteed and 24/7 customer support.</li> ' +
                '</ul> ' +
                '<section class="btn-container"> ' +
                '<a class="btn-windows" download href="https://www.easygetinsta.com/downloadpc"> ' +
                '<button class="btn-download-green icon-windows"> ' +
                '<section class="icon"> ' +
                '<i></i> ' +
                '<b></b> ' +
                '</section> ' +
                '<section class="text">Free Download</section>' +
                '</button>' +
                '</a> ' +
                '<a class="btn-android" download href="https://www.easygetinsta.com/downloadcenter"> ' +
                '<button class="btn-download-green icon-android"> ' +
                '<section class="icon"> ' +
                '<i></i> ' +
                '<b></b> ' +
                '</section> ' +
                '<section class="text">Free Download</section>' +
                '</button> ' +
                '</a> ' +
                '<a class="btn-ios" href="https://apps.apple.com/app/app-store/id1498558125"> ' +
                '<button class="btn-download-green icon-ios"> ' +
                '<section class="icon"> ' +
                '<i></i> ' +
                '<b></b> ' +
                '</section> ' +
                '<section class="text">Free Download</section>' +
                '</button> ' +
                '</a> ' +
                '<a class="btn-buy" href="https://www.easygetinsta.com/buy-instagram-followers"> ' +
                '<button class="buy">Buy Now</button>' +
                '</a> ' +
                '</section> ' +
                '</section> ' +
                '<section style="height: 60px;"></section><br>'],
                ['download module 2', '<section class="download-type-2">' +
                '<hr>' +
                '<section class="btn-container">' +
                '<a class="btn-windows" download href="https://www.easygetinsta.com/downloadpc">' +
                '<button class="btn-download-green icon-windows">' +
                '<section class="icon">' +
                '<i></i>' +
                '<b></b>' +
                '</section>' +
                '<section class="text">Free Download</section>' +
                '</button>' +
                '</a>' +
                '<a class="btn-android" download href="https://www.easygetinsta.com/downloadcenter">' +
                '<button class="btn-download-green icon-android">' +
                '<section class="icon">' +
                '<i></i>' +
                '<b></b>' +
                '</section>' +
                '<section class="text">Free Download</section>' +
                '</button>' +
                '</a>' +
                '<a class="btn-ios" href="https://apps.apple.com/app/app-store/id1498558125">' +
                '<button class="btn-download-green icon-ios">' +
                '<section class="icon">' +
                '<i></i>' +
                '<b></b>' +
                '</section>' +
                '<section class="text">Free Download</section>' +
                '</button>' +
                '</a>' +
                '<a class="btn-buy" href="https://www.easygetinsta.com/buy-instagram-followers">' +
                '<button class="buy">Buy Now</button>' +
                '</a>' +
                '</section>' +
                '<p class="note">100% safe & clean</p>' +
                '<hr>' +
                '</section>' +
                '<section style="height: 60px;"></section><br>']
            ];

            this.clips.template = $('<ul id="redactor-modal-list">');

            for (var i = 0; i < items.length; i++) {
                var li = $('<li>');
                var a = $('<a href="#" class="redactor-clip-link">').text(items[i][0]);
                var div = $('<div class="redactor-clip">').hide().html(items[i][1]);

                li.append(a);
                li.append(div);
                this.clips.template.append(li);
            }

            this.modal.addTemplate('clips', '<section>' + this.utils.getOuterHtml(this.clips.template) + '</section>');

            var button = this.button.add('clips', 'Clips');
            this.button.addCallback(button, this.clips.show);

        },
        show: function () {
            this.modal.load('clips', 'Insert Clips', 400);

            this.modal.createCancelButton();

            $('#redactor-modal-list').find('.redactor-clip-link').each($.proxy(this.clips.load, this));

            this.selection.save();
            this.modal.show();
        },
        load: function (i, s) {
            $(s).on('click', $.proxy(function (e) {
                e.preventDefault();
                this.clips.insert($(s).next().html());

            }, this));
        },
        insert: function (html) {
            this.selection.restore();
            this.insert.html(html, false);
            this.modal.close();
            this.observe.load();
        }
    };
};

