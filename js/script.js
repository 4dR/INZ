$( document ).ready(function() {


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

           

            // $("#daneGracza").html('<p>Kills: '+ result.playerstats.stats.find(item => item.name==="total_kills").value 
            // + '</p>' + '<p>Deaths: '+ result.playerstats.stats.find(item => item.name==="total_deaths").value + '</p>'
            // + '<p>K/D ratio: '+ result.playerstats.stats.find(item => item.name==="total_kills").value
            //     /  result.playerstats.stats.find(item => item.name==="total_deaths").value + '</p>');
        }
    });
}