$(document).ready(function() {

	// VAR TO ANIMATE //
	var	next 			= $("#next"),
		prev 			= $("#prev"),
		profil1		 	= $("#1"),
		profil2 		= $("#2"),
		profil3 		= $("#3"),
		profil4 		= $("#4"),
		profil5 		= $("#5"),
		profil6 		= $("#6"),
		profil7 		= $("#7"),
		profil8 		= $("#8"),
		profil9 		= $("#9"),
		profil10 		= $("#10"),
		slide           = $(".slideBox"),
        imgList         = slide.children('li'),
        imgListLen      = imgList.length,
        i               = 0;

        imgList.animate({
        	'margin-top': '140px',
            'margin-left': '-40px'
        });

        next.click(function() {
        	console.log("test");
            imgList.eq(i).fadeOut("slow", function() {
                i += 1;
                if (i === imgListLen) {
                    i = 0;
                }
                imgList.eq(i).fadeIn("slow");
            });
        });

        prev.click(function() {
        	console.log("test2")
            imgList.eq(i).fadeOut("slow", function() {
                i -= 1;
                if (i < 0) {
                    i = imgListLen - 1;
                }
                imgList.eq(i).fadeIn("slow");
                });
            });
});