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

        $('.single-star').removeClass('golden-star');
        
        for(var i = 1; i <= convertNum; i++) {
            $('#star-' + i).addClass('golden-star');
        }
    })
        

});

function getProfileStats(counter, steamid, appid) {
    var apiKey = "1B44B75A347135DDFA2F70FF5D7F17EA";

    $.ajax({
        url: "https://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v2/?key=" + apiKey + "&steamid=" + steamid + "&appid=" + appid,
        success: function(result){

            if (appid == 730) {
                $('#kda-' + counter).html((result.playerstats.stats.find(item => item.name==="total_kills").value
                 / result.playerstats.stats.find(item => item.name==="total_deaths").value).toFixed(2) + ' KDR');

                $('#kills-' + counter).html(result.playerstats.stats.find(item => item.name==="total_kills").value + ' Kills');

            }  else if(appid == 252490) {
                $('#kda-' + counter).html((result.playerstats.stats.find(item => item.name==="kill_player").value
                 / result.playerstats.stats.find(item => item.name==="deaths").value).toFixed(2) + ' KDR');

                $('#kills-' + counter).html(result.playerstats.stats.find(item => item.name==="kill_player").value + ' Kills');
            }


        }
    });
}

function getPersonalStats(steamid, appid) { 
    var apiKey = "1B44B75A347135DDFA2F70FF5D7F17EA";

    $.each(appid, function(idx, val) {
        if(val === 252490) {
            $.ajax({
                url: "https://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v2/?key=" + apiKey + "&steamid=" + steamid + "&appid=" + appid,
                success: function(result){
                    console.log(result);
                    $('.hs-count-rust').html(result.playerstats.stats.find(item=>item.name==="headshot").value);

                    $('.deaths-count-rust').html(result.playerstats.stats.find(item=>item.name==="deaths").value);

                    $('.bow-acc').html(((result.playerstats.stats.find(item=>item.name==="arrow_hit_boar").value + 
                    result.playerstats.stats.find(item=>item.name==="arrow_hit_entity").value + 
                    result.playerstats.stats.find(item=>item.name==="arrow_hit_building").value + 
                    result.playerstats.stats.find(item=>item.name==="arrow_hit_bear").value + 
                    result.playerstats.stats.find(item=>item.name==="arrow_hit_wolf").value + 
                    result.playerstats.stats.find(item=>item.name==="arrow_hit_chicken").value + 
                    result.playerstats.stats.find(item=>item.name==="arrow_hit_stag").value + 
                    result.playerstats.stats.find(item=>item.name==="arrow_hit_horse").value + 
                    result.playerstats.stats.find(item=>item.name==="arrow_hit_player").value) / 
                    (result.playerstats.stats.find(item=>item.name==="arrow_fired").value) * 100).toFixed(0) + '%');

                    $('.rifle-acc').html(((result.playerstats.stats[10].value + 
                    result.playerstats.stats.find(item=>item.name==="bullet_hit_entity").value + 
                    result.playerstats.stats.find(item=>item.name==="bullet_hit_building").value + 
                    result.playerstats.stats.find(item=>item.name==="bullet_hit_bear").value + 
                    result.playerstats.stats.find(item=>item.name==="bullet_hit_horse").value +
                    result.playerstats.stats.find(item=>item.name==="bullet_hit_stag").value + 
                    result.playerstats.stats.find(item=>item.name==="bullet_hit_wolf").value + 
                    result.playerstats.stats.find(item=>item.name==="bullet_hit_boar").value + 
                    result.playerstats.stats.find(item=>item.name==="bullet_hit_sign").value + 
                    result.playerstats.stats.find(item=>item.name==="bullet_hit_playercorpse").value + 
                    result.playerstats.stats.find(item=>item.name==="bullet_hit_corpse").value) / 
                    (result.playerstats.stats.find(item=>item.name==="bullet_fired").value) * 100).toFixed(0) + '%');

                    $('.total-kills-rust').html(result.playerstats.stats[9].value);
                    $('.kdr-rust').html((result.playerstats.stats[9].value / result.playerstats.stats[0].value).toFixed(2));    

                }
            });
        } else {
            $.ajax({
                url: "https://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v2/?key=" + apiKey + "&steamid=" + steamid + "&appid=" + appid,
                success: function(result){
                    console.log(result);
                    $('.total-kills-cs').html(result.playerstats.stats.find(item=>item.name==="total_kills").value);
                    $('.kdr-cs').html((result.playerstats.stats.find(item=>item.name==="total_kills").value
                     / result.playerstats.stats.find(item=>item.name==="total_deaths").value).toFixed(2));
                    $('.hs-count-cs').html(result.playerstats.stats.find(item=>item.name==="total_kills_headshot").value);
                    $('.ak47-kills').html(result.playerstats.stats.find(item=>item.name==="total_kills_ak47").value);
                    $('.m4a4-kills').html(result.playerstats.stats.find(item=>item.name==="total_kills_m4a1").value);
                    $('.awp-kills').html(result.playerstats.stats.find(item=>item.name==="total_kills_awp").value);

                }
            });
        }
    })


}

function compareToOthers(steamid, appid) {
    var apiKey = "1B44B75A347135DDFA2F70FF5D7F17EA";

    $.ajax({
        url: "https://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v2/?key=" + apiKey + "&steamid=" + steamid + "&appid=" + appid,
        success: function(result){
            let kda = parseFloat((result.playerstats.stats.find(item=>item.name==="total_kills").value
            / result.playerstats.stats.find(item=>item.name==="total_deaths").value).toFixed(2));
            let kills = result.playerstats.stats.find(item=>item.name==="total_kills").value;
            getUserList(kills, kda, appid);
        
        }
    });



}

function getUserList(kills, kda, appid) {
    var apiKey = "1B44B75A347135DDFA2F70FF5D7F17EA";
    let usersList = [];

    $.ajax({
        type: 'POST',
        url: '/actions/getUsers.php',
        dataType: 'json', 
        success: function(result){
            console.log(result)
            $.each(result, function(idx, val) {
                //console.log(val)
                $.ajax({
                    url: "https://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v2/?key=" + apiKey + "&steamid=" + val.steamid + "&appid=" + appid,
                    success: function(r){
                        let kda = parseFloat((r.playerstats.stats.find(item=>item.name==="total_kills").value
                            / r.playerstats.stats.find(item=>item.name==="total_deaths").value).toFixed(2));
                        let kills = r.playerstats.stats.find(item=>item.name==="total_kills").value;
                        usersList.push([val.id, kills, kda])
                    }
                });
            })

            showFoundUsers(usersList, kills, kda);
            //console.log(usersList, kills, kda);
        },
        fail: function($e) {
            alert($e);
        }
    });

    return false;

}

function showFoundUsers(usersList, kills, kda) {

    let sorted = [];

    var objects = {
        userlist: usersList,
        kills: kills,
        kda: kda
    };

    console.log(objects)

    var arr = $.map(objects, function(value, index) {
        return [value];
    });

    console.log(arr)

    $.each(usersList, function(idx, val) {
       
        
    })
}

// $('#kills-' + counter).html(result.playerstats.stats.find(item => item.name==="kill_player").value + ' Kills');
///var myProxy = 'https://young-eyrie-53521.herokuapp.com/';