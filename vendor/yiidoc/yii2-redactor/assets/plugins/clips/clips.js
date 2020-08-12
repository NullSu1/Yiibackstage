if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.clips = function () {
    return {
        init: function () {
            var items = [
                ['add Title', '<h2 class="title-list">title</h2>' +
                '<p>text</p>'],
                ['Add title list', '<section class="title_list_box">title list</section>'],
                ['Add Tips', '<section class="tips">' +
                'Want to know how to advertise on Instagram? There are actually a few different options, but this post will help to make sense of it all by showing you how to' +
                'advertise' +
                'on Instagram using each of them. ' +
                '</section>'],
                ['Add redirect',
                '<section class="related-list">' +
                '   <h2>Related Readings for Reference</h2>' +
                '   <a href="/blog/#" class=""> link text </a>' +
                '</section>'],
                ['Add Table',
                '<table>' +
                '   <thead>' +
                '       <tr>' +
                '           <th>Features</th>' +
                '           <th>GetInsta</th>' +
                '           <th>GetInsta</th>' +
                '           <th><b>GetInsta</b></th>' +
                '       </tr>' +
                '   </thead>' +
                '   <tbody>' +
                '       <tr>' +
                '           <td>High Quality - Real & Safe</td>' +
                '           <td><i class="check"></i></td>' +
                '           <td><i class="check"></i></td>' +
                '           <td><i class="check"></i></td>' +
                '       </tr>' +
                '       <tr>' +
                '           <td>High Quality - Real & Safe</td>' +
                '           <td></td>' +
                '           <td><i class="cross"></i></td>' +
                '           <td><i class="check"></i></td>' +
                '       </tr>' +
                '   </tbody>' +
                '</table>'],
                ['download module 1',
                '<section class="download-type-1">' +
                '   <h2>GetInsta - Get Free Instagram Followers & Likes</h2>' +
                '   <ul>' +
                '       <li>Free high-quality Instagram followers & likes from 100% real person.</li>' +
                '       <li>Getting followers and also get the same amount of additional free likes.</li>' +
                '       <li>Instant delivery guaranteed and 24/7 customer support.</li>' +
                '   </ul>' +
                '<section class="btn-container">' +
                '   <a class="btn-windows" download href="https://www.easygetinsta.com/downloadpc">' +
                '       <button class="btn-download-green icon-windows">' +
                '           <section class="icon">' +
                '               <q></q>' +
                '               <g></g>' +
                '           </section>' +
                '           <section class="text">Free Download</section>' +
                '       </button>' +
                '   </a>' +
                '   <a class="btn-android" download href="https://www.easygetinsta.com/downloadcenter">' +
                '       <button class="btn-download-green icon-android">' +
                '           <section class="icon">' +
                '               <q></q>' +
                '               <g></g>' +
                '           </section>' +
                '           <section class="text">Free Download</section>' +
                '       </button>' +
                '   </a>' +
                '   <a class="btn-ios" href="https://apps.apple.com/app/app-store/id1498558125">' +
                '       <button class="btn-download-green icon-ios"> ' +
                '           <section class="icon"> ' +
                '               <q></q> ' +
                '               <b></b> ' +
                '           </section> ' +
                '           <section class="text">Free Download</section>' +
                '       </button> ' +
                '   </a> ' +
                '   <a class="btn-buy" href="https://www.easygetinsta.com/buy-instagram-followers"> ' +
                '       <button class="buy">Buy Now</button>' +
                '   </a> ' +
                '</section> '],
                ['download module 2',
                '<section class="download-type-2">' +
                '   <hr>' +
                '   <section class="btn-container">' +
                '       <a class="btn-windows" download href="https://www.easygetinsta.com/downloadpc">' +
                '           <button class="btn-download-green icon-windows">' +
                '               <section class="icon">' +
                '                   <q></q>' +
                '                   <b></b>' +
                '               </section>' +
                '               <section class="text">Free Download</section>' +
                '           </button>' +
                '       </a>' +
                '       <a class="btn-android" download href="https://www.easygetinsta.com/downloadcenter">' +
                '           <button class="btn-download-green icon-android">' +
                '               <section class="icon">' +
                '                   <q></q>' +
                '                   <g></g>' +
                '               </section>' +
                '               <section class="text">Free Download</section>' +
                '           </button>' +
                '       </a>' +
                '       <a class="btn-ios" href="https://apps.apple.com/app/app-store/id1498558125">' +
                '           <button class="btn-download-green icon-ios">' +
                '               <section class="icon">' +
                '                   <q></q>' +
                '                   <g></g>' +
                '               </section>' +
                '               <section class="text">Free Download</section>' +
                '           </button>' +
                '       </a>' +
                '       <a class="btn-buy" href="https://www.easygetinsta.com/buy-instagram-followers">' +
                '           <button class="buy">Buy Now</button>' +
                '       </a>' +
                '   </section>' +
                '   <p class="note">100% safe & clean</p>' +
                '   <hr>' +
                '</section>'],
                ['download module 3', '<section data-v-7e641664="" class="download">' +
                '<section data-v-7e641664="" class="download__left">' +
                '<h3 data-v-7e641664="">GetInsta - Ultimate Tool to Get Free Instagram Followers &amp; Likes</h3>' +
                '<ul data-v-7e641664="">' +
                '<li data-v-7e641664="">Get followers and likes from 1 00% real and activated Instagram users.</li>' +
                '<li data-v-7e641664="">Organically increasing of followers or likes day by day.</li>' +
                '<li data-v-7e641664="">Unlimited free and 100% safe. No payment. No password. No survey.</li>' +
                '</ul>' +
                '</section>' +
                '<section data-v-7e641664="" class="download__right">' +
                '<p data-v-7e641664="" class="star">' +
                '<q data-v-7e641664=""></q>' +
                '<q data-v-7e641664=""></q>' +
                '<q data-v-7e641664=""></q>' +
                '<q data-v-7e641664=""></q>' +
                '<q data-v-7e641664=""></q>' +
                '</p>' +
                '<section data-v-7e641664="" class="btn-container">' +
                '<a data-v-7e641664="" download="" href="https://www.easygetinsta.com/downloadpc" onclick="ga(\'send\',\'event\',\'insdl\',\'download\',\'blogwindl2-190\')" class="btn-windows">' +
                '<button data-v-bda4fb4c="" data-v-7e641664="" style="border-radius: 64px;">' +
                '<span data-v-bda4fb4c="">Free Download</span>' +
                '</button>' +
                '</a>' +
                '<a data-v-7e641664="" download="" href="https://www.easygetinsta.com/downloadcenter" onclick="ga(\'send\',\'event\',\'insdl\',\'download\',\'blogappdl2-190\')" class="btn-android">' +
                '<button data-v-bda4fb4c="" data-v-7e641664="" style="border-radius: 64px;">' +
                '<span data-v-bda4fb4c="">Free Download</span>' +
                '</button>' +
                '</a>' +
                '<a data-v-7e641664="" href="https://apps.apple.com/us/app/getinsta-find-your-hot-posts/id1498558125" onclick="ga(\'send\',\'event\',\'insdl\',\'download\',\'blogiosdl2-190\')" class="btn-ios">' +
                '<button data-v-bda4fb4c="" data-v-7e641664="" style="border-radius: 64px;">' +
                '<span data-v-bda4fb4c="">Free Download</span>' +
                '</button>' +
                '</a>' +
                '</section>' +
                '<p data-v-7e641664="" class="note">100% safe &amp; clean</p>' +
                '</section>' +
                '</section>']
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

