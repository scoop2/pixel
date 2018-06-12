//var sound;
//Vue.config.devtools = true;

$(document).ready(function () {




    /*
        var gradient = transitionColor('ff', '00', '1');
        var count = 1;
        var string = '  background: linear-gradient(to top, rgba(205,180,93,0) 0%, rgba(205,180,93,0) 2%, rgba(205,180,93,1) 100%);';
        for (var i = 0; i < gradient.length(); i++){
            string += gradient[i] + ', ';
            count++;

        }
        $('.content').css();
        */

    //  $('.gradientest').gradienter({ color_start: '000000', color_end: 'ffffff' });

    // $('.content').html(colorA);

    var colour_1 = [255, 255, 55, '.5'];
    var colour_2 = [0, 0, 0, '.5'];
    var shade_colour = [0, 0, 0, '.5'];
    var number_of_shards = 12;
    var complexity = '.8';
    var lightness = 2;
    var alpha_constant = true;

    //  $('.rainbow').shards(colour_1, colour_2, shade_colour,  number_of_shards, complexity, lightness, alpha_constant);
    //  $('.rainbow').shards([0,0,0,.5],[255,0,0,1],[255.255,0,1],10,10,1,true);




    $('#play').on('click', function () {
        sound.play();
        $(this).css('display', 'none');
        $('#pause').css('display', 'block');
        console.log('pla')

    });

    $('#pause').on('click', function () {
        sound.pause();
        $(this).css('display', 'none');
        $('#play').css('display', 'block');
        console.log('pau')
    });

});

$(document).resize(function () {
    //  $('.allHeight').height($(document).height());
    //  $('canvas').height($(document).height());
    //   $('canvas').css('height', $(document).height());
});


$('#menu-hover').on('click', function () {
    var tmp = $(this).attr('id');
    var div = $('#');
    switch (tmp) {
        case 1:

    }
});


function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}


var transitionColor = function (from, to, count) {
    var div = count + 1;
    var int = parseInt(from, 16); // 100
    var intTo = parseInt(to, 16); // 50
    var list = []; // 5
    var diff = int - intTo; // 50
    var isNegative = diff < 0; // false
    var one = diff / div; // 10

    list.push(from);
    for (var i = 1; i <= div; i++) {
        list.push(Math.floor(int - (one * i)).toString(16));
    }

    return list;
};

var transition = function (from, to, div) {
    if (div == null) div = 3;
    var r = from.slice(0, 2), g = from.slice(2, 4), b = from.slice(4, 6);
    var rt = to.slice(0, 2), gt = to.slice(2, 4), bt = to.slice(4, 6);
    var allR = transitionColor(r, rt, div);
    var allG = transitionColor(g, gt, div);
    var allB = transitionColor(b, bt, div);
    var list = [];

    allR.forEach(function (_, i) {
        list.push('' + allR[i] + allG[i] + allB[i]);
    });

    return list;
};

var generateGradientStepsCss = function (from, to, div) {
    var values = transition(from, to, div);
    var total = 100 / (div + 1);
    var obj = [];
    for (var i = 0; i <= div + 1; i++) {
        obj.push({percentage: Math.floor(total * i), value: values[i]});
    }
    var cssValues = obj.map(function (value) {
        return '#' + value.value + ' ' + value.percentage + '%';
    }).join(', ');
    return 'linear-gradient(' + cssValues + ')'
};


/*

var targets = [
    {
        type: ParticleSaga.ImageTarget,
        url: 'images/beat.png',
        options: {
            size: 3
        }
    }
];



// The scene's context element contains the canvas
var saga = document.getElementById('saga');

var scene = new ParticleSaga.Scene(saga, targets, {
    numParticles: 40000,
    sort: ParticleSaga.VertexSort.leftToRight
});

// init will make all targets begin loading assets
// and create everything else needed in the scene.
scene.load(function() {
    scene.setTarget(0);
    //scene.startSlideshow();
});
*/




function loadApi() {
    $.ajax({
        url: 'http://localhost:86/pixelmorph/api/1',
        type: 'GET',
     //   data: {
     //       format: 'json'
       // },
     //   dataType: 'jsonp',
  //      data: {
       //     MatchId: "@(string.Join(",", Model.matchInformation.Select(m => m.MatchId).ToArray()))",
       //     filter: collectFilter(),
       //     live: liveNonelive(),
      //      page: pageIn,
      //      eOnPage: eOnPageIn,
      //      openEvents: openEvents.toString()
 //      },
        beforeSend: function () {},
        success: function (data, textStatus, jqXHR) {
            console.log('sucsess')
            console.log(data)
            return data;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('error!!')
            console.log(errorThrown)
        }
    });
}
