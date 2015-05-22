$(document).ready(function(){
    $("#signIn").click(function(){$("#signInWindow").bPopup({
            speed: 650,
            transition: 'slideIn',
			transitionClose: 'slideBack',
			positionStyle: 'absolute'
			/*modalColor: 'none'*/
        });
	});
});
$(document).ready(function(){
    $("#registro").click(function(){$("#registerWindow").bPopup({
            speed: 650,
            transition: 'slideIn',
			transitionClose: 'slideBack',
			positionStyle: 'absolute'
			/*modalColor: 'none'*/
        });
	});
});