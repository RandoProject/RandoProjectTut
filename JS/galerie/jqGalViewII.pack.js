eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(3($){$.1C.m=3(k){A n.1g(3(i){8 h=n;h.N=$(n);h.L=h.N.1s(\'1e\');h.s=$.1T({},m.1c,k);h.E=i;h.1L=h.L.1I();h.Q=m.14(h);h.M=$(\'<9 p="1v">\').o(h.Q);h.u=$(\'<9 p="1n">\').o(h.M);h.7=$(\'<1e 1X="1V:1S;"/>\').o(h.u);h.X=$(\'<9 p="1P"/>\').o(h.u);h.V=$(\'<9 p="1N"/>\').o(h.u);h.1b=$(\'<9 p="1K"/>\').o(h.M);h.N.1J(h.Q).1G();h.R=h.u.z();h.K=h.u.y();h.L.1g(3(j){8 d=$(n);8 e=n;e.E=j;8 f=$(\'<9 12="1y\'+j+\'" p="1w">\').o(h.1b).1a(\'<9 p="1t">\');4(h.s.D==0){e.q=d.1m().Y(\'1j\')}H 4(h.s.D==1){e.q=h.s.1h+e.r.1U(\'/\').1R()}H 4(h.s.D==2){e.q=e.r.1Q(h.s.1d,\'\')};n.W=d.Y(\'1O\');8 g=U T();g.v=3(){g.v=F;f.1M().1a(d);8 b=m.S({"w":f.z(),"h":f.y()},{"w":g.z,"h":g.y});d.x({J:b.l,I:b.t});8 c=U T();c.v=3(){c.v=F;$(\'<9 p="1F">\').o(f).x({P:".16"}).O(3(){8 a=$(n);a.x({P:".1E"}).1D().1B({P:".16"},1A)}).C(3(){d.B(\'C\')}).B(\'O\');d.C(3(){m.13(n,h)}).x({J:b.l,I:b.t});4(e.E==0){d.B(\'C\');d.1z().B(\'O\')}};c.r=e.q};g.r=e.r})})};m={1i:3(a,b){4(b.w>a.w){b.h=b.h*(a.w/b.w);b.w=a.w;4(b.h>a.w){b.w=b.w*(a.h/b.h);b.h=a.h}}H 4(b.h>a.h){b.w=b.w*(a.h/b.h);b.h=a.h;4(b.w>a.w){b.h=b.h*(a.w/b.w);b.w=a.w}};A b},S:3(a,b){A{"l":(a.w-b.w)*.5,"t":(a.h-b.h)*.5}},14:3(a){A $(\'<9 12="1x\'+a.E+\'">\')},13:3(b,c){4(11 b.q==\'15\')A 1H;8 d=b.q;4(/1u/.18(d)){d=/\\?/.18(b.q)?\'&17=19\':\'?17=19\'};c.X.1r();7=U T();7.v=3(){7.v=F;6={};6.w=$1q=7.z;6.h=$1p=7.y;6=m.1i({"w":c.R,"h":c.K},{"w":6.w,"h":6.h});8 a=m.S({"w":c.R,"h":c.K},{"w":6.w,"h":6.h});c.7.x({z:6.w,y:6.h,J:a.l,I:a.t});c.X.10(\'G\');c.V.Z(\'G\',0.1);c.7.10(\'G\',3(){c.7.Y(\'r\',d).1o();4(11 b.W!=\'15\'){c.V.Z("G",c.s.1f).1l(b.W)}})};7.r=d},1c:{D:0,1h:F,1d:\'1k.\',1f:.1W}}})(1Y);',62,123,'|||function|if||dem|image|var|div|||||||||||||jqGalViewII|this|appendTo|class|altImg|src|opts||mainImgContainer|onload||css|height|width|return|trigger|click|getUrlBy|index|null|fast|else|marginTop|marginLeft|imgCh|jqchildren|container|jqthis|mouseover|opacity|jqjqviewii|imgCw|center|Image|new|altTextBox|altTxt|loader|attr|fadeTo|fadeOut|typeof|id|view|swapOut|undefined|01|imgmax|test|800|append|holder|defaults|prefix|img|titleOpacity|each|fullSizePath|resize|href|thumbnail|text|parent|gvIIImgContainer|fadeIn|hOrg|wOrg|show|find|gvIILoaderMini|picasa|gvIIContainer|gvIIItem|jqgvii|gvIIID|siblings|500|animate|fn|stop|75|gvIIFlash|remove|false|size|after|gvIIHolder|totalChildren|empty|gvIIAltText|alt|gvIILoader|replace|pop|none|extend|split|display|60|style|jQuery'.split('|'),0,{}))(function ($) {
    $.fn.jqGalViewII = function (k) {
        return this.each(function (i) {
            var h = this;
            h.jqthis = $(this);
            h.jqchildren = h.jqthis.find('img');
            h.opts = $.extend({}, jqGalViewII.defaults, k);
            h.index = i;
            h.totalChildren = h.jqchildren.size();
            h.jqjqviewii = jqGalViewII.swapOut(h);
            h.container = $('<div class="gvIIContainer">').appendTo(h.jqjqviewii);
            h.mainImgContainer = $('<div class="gvIIImgContainer">').appendTo(h.container);
            h.image = $('<img style="display:none;"/>').appendTo(h.mainImgContainer);
            h.loader = $('<div class="gvIILoader"/>').appendTo(h.mainImgContainer);
            h.altTextBox = $('<div class="gvIIAltText"/>').appendTo(h.mainImgContainer);
            h.holder = $('<div class="gvIIHolder"/>').appendTo(h.container);
            h.jqthis.after(h.jqjqviewii).remove();
            h.imgCw = h.mainImgContainer.width();
            h.imgCh = h.mainImgContainer.height();
            h.jqchildren.each(function (j) {
                var d = $(this);
                var e = this;
                e.index = j;
                var f = $('<div id="gvIIID' + j + '" class="gvIIItem">').appendTo(h.holder).append('<div class="gvIILoaderMini">');
                if(h.opts.getUrlBy == 0) {
                    e.altImg = d.parent().attr('href')
                } else if(h.opts.getUrlBy == 1) {
                    e.altImg = h.opts.fullSizePath + e.src.split('/').pop()
                } else if(h.opts.getUrlBy == 2) {
                    e.altImg = e.src.replace(h.opts.prefix, '')
                };
                this.altTxt = d.attr('alt');
                var g = new Image();
                g.onload = function () {
                    g.onload = null;
                    f.empty().append(d);
                    var b = jqGalViewII.center({
                        "w": f.width(),
                        "h": f.height()
                    }, {
                        "w": g.width,
                        "h": g.height
                    });
                    d.css({
                        marginLeft: b.l,
                        marginTop: b.t
                    });
                    var c = new Image();
                    c.onload = function () {
                        c.onload = null;
                        $('<div class="gvIIFlash">').appendTo(f).css({
                            opacity: ".01"
                        }).mouseover(function () {
                            var a = $(this);
                            a.css({
                                opacity: ".75"
                            }).stop().animate({
                                opacity: ".01"
                            }, 500)
                        }).click(function () {
                            d.trigger('click')
                        }).trigger('mouseover');
                        d.click(function () {
                            jqGalViewII.view(this, h)
                        }).css({
                            marginLeft: b.l,
                            marginTop: b.t
                        });
                        if(e.index == 0) {
                            d.trigger('click');
                            d.siblings().trigger('mouseover')
                        }
                    };
                    c.src = e.altImg
                };
                g.src = e.src
            })
        })
    };
    jqGalViewII = {
        resize: function (a, b) {
            if(b.w > a.w) {
                b.h = b.h * (a.w / b.w);
                b.w = a.w;
                if(b.h > a.w) {
                    b.w = b.w * (a.h / b.h);
                    b.h = a.h
                }
            } else if(b.h > a.h) {
                b.w = b.w * (a.h / b.h);
                b.h = a.h;
                if(b.w > a.w) {
                    b.h = b.h * (a.w / b.w);
                    b.w = a.w
                }
            };
            return b
        },
        center: function (a, b) {
            return {
                "l": (a.w - b.w) * .5,
                "t": (a.h - b.h) * .5
            }
        },
        swapOut: function (a) {
            return $('<div id="jqgvii' + a.index + '">')
        },
        view: function (b, c) {
            if(typeof b.altImg == 'undefined') return false;
            var d = b.altImg;
            if(/picasa/.test(d)) {
                d = /\?/.test(b.altImg) ? '&imgmax=800' : '?imgmax=800'
            };
            c.loader.show();
            image = new Image();
            image.onload = function () {
                image.onload = null;
                dem = {};
                dem.w = $wOrg = image.width;
                dem.h = $hOrg = image.height;
                dem = jqGalViewII.resize({
                    "w": c.imgCw,
                    "h": c.imgCh
                }, {
                    "w": dem.w,
                    "h": dem.h
                });
                var a = jqGalViewII.center({
                    "w": c.imgCw,
                    "h": c.imgCh
                }, {
                    "w": dem.w,
                    "h": dem.h
                });
                c.image.css({
                    width: dem.w,
                    height: dem.h,
                    marginLeft: a.l,
                    marginTop: a.t
                });
                c.loader.fadeOut('fast');
                c.altTextBox.fadeTo('fast', 0.1);
                c.image.fadeOut('fast', function () {
                    c.image.attr('src', d).fadeIn();
                    if(typeof b.altTxt != 'undefined') {
                        c.altTextBox.fadeTo("fast", c.opts.titleOpacity).text(b.altTxt)
                    }
                })
            };
            image.src = d
        },
        defaults: {
            getUrlBy: 0,
            fullSizePath: null,
            prefix: 'thumbnail.',
            titleOpacity: .60
        }
    }
})(jQuery);