$( document ).ready(function() {

    $('.dc-name-submit').on('click', function(e) {
        e.preventDefault();
        var val = $('.dc-name-input').val();
        if(val === '') {
            alert("Input is empty!");
        } else {
            $('#discordname').submit();
        }
    })

    $('.comment-submit').on('click', function(e) {
        e.preventDefault();
        var val = $('.add-comment-area').val();
        var star = $('#hiddenbtn-star').val();
        if(val === '') {
            alert("Textarea is empty!");
            return;
        } 

        if(star == 0) {
            alert("Rating is empty!");
            return;
        } 

        

            
        return $('#newcomment').submit();
    })

    

    $('.single-star').hover(function() {
        var id = $(this).attr('id');
        var num = id.substr(5);
        var convertNum = parseInt(num);
        console.log($('#hiddenbtn-star').val());
        if($('#hiddenbtn-star').val() == '0') {
            $('.single-star').removeClass('golden-star');
        

            for(var i = 1; i <= convertNum; i++) {
                $('#star-' + i).addClass('golden-star');
            }
        }
        
    })

    $('.rating-bottom').mouseout(function(){
        if($('#hiddenbtn-star').val() == '0') {
            $('.single-star').removeClass('golden-star');
        }
    })
     

    

    $('.single-star').on('click',function() {
        var id = $(this).attr('id');
        var num = id.substr(5);
        var convertNum = parseInt(num);

        $('#hiddenbtn-star').val(convertNum)
        console.log("asd");

        $('.single-star').removeClass('golden-star');
        
        for(var i = 1; i <= convertNum; i++) {
            $('#star-' + i).addClass('golden-star');
        }
    })
        

});

function getProfileStats(counter, steamid, appid) {
    var myProxy = 'https://young-eyrie-53521.herokuapp.com/';
    var apiKey = "1B44B75A347135DDFA2F70FF5D7F17EA";

    $.ajax({
        url: myProxy + "https://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v2/?key=" + apiKey + "&steamid=" + steamid + "&appid=" + appid,
        success: function(result){
            console.log(result);

            if (appid == 730) {
                $('#kda-' + counter).html((result.playerstats.stats.find(item => item.name==="total_kills").value / result.playerstats.stats.find(item => item.name==="total_deaths").value).toFixed(2) + ' KDR');
                $('#kills-' + counter).html(result.playerstats.stats.find(item => item.name==="total_kills").value + ' Kills');
            }  else if(appid == 252490) {
                $('#kda-' + counter).html((result.playerstats.stats.find(item => item.name==="kill_player").value / result.playerstats.stats.find(item => item.name==="deaths").value).toFixed(2) + ' KDR');
                $('#kills-' + counter).html(result.playerstats.stats.find(item => item.name==="kill_player").value + ' Kills');
            }


        }
    });
}

function getPersonalStats(steamid, appid) {
    var myProxy = 'https://young-eyrie-53521.herokuapp.com/';
    var apiKey = "1B44B75A347135DDFA2F70FF5D7F17EA";

    console.log(appid);

    $.each(appid, function(idx, val) {
        console.log(val);
        if(val === 252490) {
            $.ajax({
                url: myProxy + "https://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v2/?key=" + apiKey + "&steamid=" + steamid + "&appid=" + appid,
                success: function(result){
                    console.log(result);
                    $('.hs-count').html(result.playerstats.stats[22].value);
                    $('.deaths-count').html(result.playerstats.stats[0].value);
                }
            });
        } else {
            $.ajax({
                url: myProxy + "https://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v2/?key=" + apiKey + "&steamid=" + steamid + "&appid=" + appid,
                success: function(result){
                    console.log(result);
                    $('.hs-count').html(result.playerstats.stats[22].value);
                    $('.deaths-count').html(result.playerstats.stats[0].value);
                }
            });
        }
    })


}