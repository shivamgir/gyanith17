function generate(type, text) {

            var n = noty({
            text        : type,
            type        : type,
            dismissQueue: false,
            timeout: 5000,
            layout      : 'topCenter',
            theme       : 'relax',
            progessBar	: true, 
        });
        console.log('html: ' + n.options.id);
        return n;
    }
       

        

       	function generateAll() {
       	 	generate("Welcome to Gyanith'17-Feb 24 to 26");
            generate("Workshops registration started");
            generate("Limited registrations. Register soon");
            generate("Event registration started");
            generate("Schedule is available for download at profile section");

       	}

       	$(document).ready(function(){

       		setInterval(function () {
            generateAll();
          
        }, 3000);

       	});