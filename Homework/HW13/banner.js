var delay = 2; //number of seconds between rotations
var current = 0; //start the counter at 0

//place the urls here
var urls = new Array();
    urls[0]="https://www.southern.edu/biology/alliedhealth/Pages/degrees.aspx";
    urls[1]="http://art.southern.edu/";
    urls[2]="http://biology.southern.edu/";
    urls[3]="https://www.southern.edu/business";
    urls[4]="http://chemistry.southern.edu/";
    urls[5]="https://www.southern.edu/cs/Pages/default.aspx";
    urls[6]="http://edpsych.southern.edu/";
    urls[7]="https://www.southern.edu/english/Pages/default.aspx";
    urls[8]="https://www.southern.edu/history/Pages/default.aspx";
    urls[9]="http://journalism.southern.edu/";
    urls[10]="http://math.southern.edu/";
    urls[11]="https://www.southern.edu/modernlanguages/Pages/default.aspx";
    urls[12]="http://music.southern.edu/";
    urls[13]="https://www.southern.edu/nursing/Pages/default.aspx";
    urls[14]="https://www.southern.edu/physics/Pages/default.aspx";
    urls[15]="https://www.southern.edu/religion/Pages/default.aspx";
    urls[16]="https://www.southern.edu/socialwork/Pages/home.aspx";
    urls[17]="https://www.southern.edu/southernscholars/Pages/default.aspx";
    urls[18]="https://www.southern.edu/technology/Pages/default.aspx";
    urls[19]="https://www.southern.edu/pe/Pages/home.aspx";

// place your images, text, etc in the array elements here
var bannerimg = new Array();
    bannerimg[0]="<a href='" + urls[0] + "' target=\"_blank\"><img alt='Allied Health' src='banners/Allied.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[1]="<a href='" + urls[1] + "' target=\"_blank\"><img alt='Art' src='banners/Art.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[2]="<a href='" + urls[2] + "' target=\"_blank\"><img alt='Biology' src='banners/Biology.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[3]="<a href='" + urls[3] + "' target=\"_blank\"><img alt='Business' src='banners/Business.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[4]="<a href='" + urls[4] + "' target=\"_blank\"><img alt='Chemistry' src='banners/Chemistry.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[5]="<a href='" + urls[5] + "' target=\"_blank\"><img alt='Computing' src='banners/Computing.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[6]="<a href='" + urls[6] + "' target=\"_blank\"><img alt='Education and Psychology' src='banners/EdPsyc.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[7]="<a href='" + urls[7] + "' target=\"_blank\"><img alt='English' src='banners/English.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[8]="<a href='" + urls[8] + "' target=\"_blank\"><img alt='History' src='banners/History.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[9]="<a href='" + urls[9] + "' target=\"_blank\"><img alt='Journalism' src='banners/Journalism.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[10]="<a href='" + urls[10] + "' target=\"_blank\"><img alt='Mathematics' src='banners/Mathematics.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[11]="<a href='" + urls[11] + "' target=\"_blank\"><img alt='Modern Languages' src='banners/ModLang.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[12]="<a href='" + urls[12] + "' target=\"_blank\"><img alt='Music' src='banners/Music.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[13]="<a href='" + urls[13] + "' target=\"_blank\"><img alt='Nursing' src='banners/Nursing.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[14]="<a href='" + urls[14] + "' target=\"_blank\"><img alt='Physics' src='banners/Physics.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[15]="<a href='" + urls[15] + "' target=\"_blank\"><img alt='Religion' src='banners/Religion.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[16]="<a href='" + urls[16] + "' target=\"_blank\"><img alt='Social Work' src='banners/Socialwork.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[17]="<a href='" + urls[17] + "' target=\"_blank\"><img alt='Southern Scholars' src='banners/Sscholars.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[18]="<a href='" + urls[18] + "' target=\"_blank\"><img alt='Technology' src='banners/Technology.jpg' height='97px' width='289px' border='0' /></a>";
    bannerimg[19]="<a href='" + urls[19] + "' target=\"_blank\"><img alt='Wellness' src='banners/Wellness.jpg' height='97px' width='289px' border='0' /></a>";

function banner() {
    if (current == 20) {
        current = 0;
    }
    document.getElementById("banner").innerHTML = bannerimg[current];
    current = current + 1;
    setTimeout("banner()", delay*1000);
}
window.onload=banner;