$(document).ready(function () {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 4,
        rtl: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    ;(function($) {

        $.fn.zoomImage = function(paras) {
            var defaultParas = {
                layerW: 100,
                layerH: 100,
                layerOpacity: 0.2,
                layerBgc: '#000',
                showPanelW: 500,
                showPanelH: 500,
                marginL: 5,
                marginT: 0
            };

            paras = $.extend({}, defaultParas, paras);

            $(this).each(function() {
                var self = $(this).css({position: 'relative'});
                var selfOffset = self.offset();
                var imageW = self.width();
                var imageH = self.height();

                self.find('img').css({
                    width: '100%',
                    height: '80%'
                });


                var wTimes = paras.showPanelW / paras.layerW;

                var hTimes = paras.showPanelH / paras.layerH;


                var img = $('<img>').attr('src', self.attr("href")).css({
                    position: 'absolute',
                    left: '0',
                    top: '0',
                    width: imageW * wTimes,
                    height: imageH * hTimes
                }).attr('id', 'big-img');


                var layer = $('<div>').css({
                    display: 'none',
                    position: 'absolute',
                    left: '0',
                    top: '0',
                    backgroundColor: paras.layerBgc,
                    width: paras.layerW,
                    height: paras.layerH,
                    opacity: paras.layerOpacity,
                    border: '1px solid #ccc',
                    cursor: 'crosshair'
                });


                var showPanel = $('<div>').css({
                    display: 'none',
                    position: 'absolute',
                    overflow: 'hidden',
                    right: imageW + paras.marginL,
                    top: paras.marginT,
                    width: paras.showPanelW,
                    height: paras.showPanelH
                }).append(img);

                self.append(layer).append(showPanel);

                self.on('mousemove', function(e) {

                    var x = e.pageX - selfOffset.left;
                    var y = e.pageY - selfOffset.top;

                    if(x <= paras.layerW / 2) {
                        x = 0;
                    }else if(x >= imageW - paras.layerW / 2) {
                        x = imageW - paras.layerW;
                    }else {
                        x = x - paras.layerW / 2;
                    }

                    if(y < paras.layerH / 2) {
                        y = 0;
                    } else if(y >= imageH - paras.layerH / 2) {
                        y = imageH - paras.layerH;
                    } else {
                        y = y - paras.layerH / 2;
                    }

                    layer.css({
                        left: x,
                        top: y
                    });

                    img.css({
                        left: -x * wTimes,
                        top: -y * hTimes
                    });
                }).on('mouseenter', function() {
                    layer.show();
                    showPanel.show();
                }).on('mouseleave', function() {
                    layer.hide();
                    showPanel.hide();
                });
            });
        }
        })(jQuery);

        // Zoom image thumnail list

        $('.zoom-slider-big-box').zoomImage();
        $('.show-small-img:first-of-type').addClass("active")
        $('.show-small-img:first-of-type').attr('alt', 'now').siblings().removeAttr('alt')
        $('.show-small-img').click(function () {
        $('#show-img').attr('src', $(this).attr('src'))
        $('#big-img').attr('src', $(this).attr('src'))
        $(this).attr('alt', 'now').siblings().removeAttr('alt')
        $(this).addClass("active").siblings().removeClass("active")
        });

        var zoomSliderH = $("[data-role='slider-big-box']").height();
        $("[data-role='thumbnail-list-container']").css({'height': zoomSliderH});


        // dropdown btn userEnterFace4
        $('a.btn-profile-header').click(function(){
            $(this).next('.dropdown-user-panel-button').slideToggle();
        })

        // dropdown btn userEnterFace4
        $('.title-dropDown-help-syntax-order').click(function(){
            $(this).next('.box-dropdown-help-order').slideToggle();
        })
        $(".chosen-select-option").chosen({rtl: true});

        $('a.replyItem').click(function(){
            $(this).next('.reply-comment-product').slideToggle();
        })

        $('a.replyItem').click(function(){
            $(this).next('.reply-comment-article').slideToggle();
        })

        $('.click-dropdown-mobile').click(function(){
            $(this).next('.dropdown-mobile').slideToggle();
        })

        $('tr.order-table').click(function(){
            $(this).next('table.order-table-child').slideToggle();
        })
});
