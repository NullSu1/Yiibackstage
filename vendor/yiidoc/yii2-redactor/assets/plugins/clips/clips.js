if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.clips = function () {
    return {
        init: function () {
            var items = [
                ['Add Tips', '<section class="tips">' +
                'Want to know how to advertise on Instagram? There are actually a few different options, but this post will help to make sense of it all by showing you how to' +
                'advertise' +
                'on Instagram using each of them. ' +
                '</section>'],
                ['Add Table', '<table>\n' +
                '              <thead>\n' +
                '              <tr>\n' +
                '                <th>Features</th>\n' +
                '                <th>GetInsta</th>\n' +
                '                <th>GetInsta</th>\n' +
                '                <th><b>GetInsta</b></th>\n' +
                '              </tr>\n' +
                '              </thead>\n' +
                '              <tbody>\n' +
                '              <tr>\n' +
                '                <td>High Quality - Real & Safe</td>\n' +
                '                <td><i class="check"></i></td>\n' +
                '                <td><i class="check"></i></td>\n' +
                '                <td><i class="check"></i></td>\n' +
                '              </tr>\n' +
                '              <tr>\n' +
                '                <td>High Quality - Real & Safe</td>\n' +
                '                <td></td>\n' +
                '                <td><i class="cross"></i></td>\n' +
                '                <td><i class="check"></i></td>\n' +
                '              </tr>\n' +
                '              </tbody>\n' +
                '            </table>'],
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
                '' +
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
                '<section style="height: 60px;"></section>'],
                ['download module 2', '<section class="download-type-2">\n' +
                '              <hr>\n' +
                '              <section class="btn-container">\n' +
                '                <a class="btn-windows" download href="https://www.easygetinsta.com/downloadpc">\n' +
                '                  <button class="btn-download-green icon-windows">\n' +
                '                    <section class="icon">\n' +
                '                      <i></i>\n' +
                '                      <b></b>\n' +
                '                    </section>\n' +
                '                    <section class="text">Free Download</section>\n' +
                '                  </button>\n' +
                '                </a>\n' +
                '\n' +
                '                <a class="btn-android" download href="https://www.easygetinsta.com/downloadcenter">\n' +
                '                  <button class="btn-download-green icon-android">\n' +
                '                    <section class="icon">\n' +
                '                      <i></i>\n' +
                '                      <b></b>\n' +
                '                    </section>\n' +
                '                    <section class="text">Free Download</section>\n' +
                '                  </button>\n' +
                '                </a>\n' +
                '\n' +
                '                <a class="btn-ios" href="https://apps.apple.com/app/app-store/id1498558125">\n' +
                '                  <button class="btn-download-green icon-ios">\n' +
                '                    <section class="icon">\n' +
                '                      <i></i>\n' +
                '                      <b></b>\n' +
                '                    </section>\n' +
                '                    <section class="text">Free Download</section>\n' +
                '                  </button>\n' +
                '                </a>\n' +
                '\n' +
                '                <a class="btn-buy" href="https://www.easygetinsta.com/buy-instagram-followers">\n' +
                '                  <button class="buy">Buy Now</button>\n' +
                '                </a>\n' +
                '              </section>\n' +
                '              <p class="note">100% safe & clean</p>\n' +
                '              <hr>\n' +
                '            </section>\n' +
                '\n' +
                '            <section style="height: 60px;"></section>']
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

