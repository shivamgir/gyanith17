function generate(type, text) {

            var n = noty({
            text        : text,
            type        : type,
            dismissQueue: false,
            timeout: 4000,
            layout      : 'topCenter',
            theme       : 'relax',
            progessBar	: true, 
        });
        console.log('html: ' + n.options.id);
        return n;
    }
       

        

       	function generateAll() {
          generate("warning","Prizes worth 1.5 lakhs to be won")
            generate('notification',"Workshops registrations stopped");
            generate('notification',"The candidates selected for the Second phase of the Paper Presentation events such as ITyuktha, Consilium and Prastuti have been personally notified with an email");
            generate('error',"For hospitality contact : +91-75981 81886");
            generate('notification',"CobWeb has ended.Check facebook page for winners.")
           // generate('notification',"COBWEB has started ");
            
            //generate('notification',"On the spot Entry fee to participate in all the events - Rs.200");
            //generate('notification',"Workshop payment can be now done via SBICollect/DD/NEFT/Internet banking.Refer Workshop pages for details")
            //generate('notification',"Limited registrations. Register soon");
        

            
            generate('notification',"Antagon-online Codechef event");
            generate('notification',"Rush hour-the robo wrestling event");
            generate('notification',"Gear up for an exciting auto-expo at Gyanith'17");
            generate('notification',"Schedule is available for download at profile section");
          

       	}

        // function generate(type, text) {

        //     var n = noty({
        //         text        : text,
        //         type        : type,
        //         dismissQueue: true,
        //         progressBar : true,
        //         timeout     : 5000,
        //         layout      : 'Left',
        //         closeWith   : ['click'],
        //         theme       : 'relax',
        //         maxVisible  : 10,
        //         animation   : {
        //             open  : 'animated bounceInLeft',
        //             close : 'animated bounceOutLeft',
        //             easing: 'swing',
        //             speed : 500
        //         }
        //     });
        //     console.log('html: ' + n.options.id);
        //     return n;
        // }


       	$(document).ready(function(){
         // generate("information","hi","hi");
       		setInterval(function () {
            generateAll();
          
        }, 3000);

       	});