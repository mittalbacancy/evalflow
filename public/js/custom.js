var endYear = 2019;

function jsGetStartYear(){
	var d = new Date();
	var month = d.getMonth();
	var date = d.getDate();
	var startYear = '';
	if ( parseInt(d.getMonth()) <= 6 && parseInt(d.getDate()) <= 25){
        startYear = parseInt(d.getFullYear());
    } else{
        startYear = parseInt(d.getFullYear())+1;
    }
    return startYear;
}
function jsGetEndYear(){	
    return endYear;    
}

function jsGetYearList(){
	var str = '';
	var startYear = jsGetStartYear() + 1;
	console.log("startYear=="+startYear);
	for(var i = startYear; i > endYear;i--) {
		var val = (i-1) + '-' + i ;
 		str += '<option value="'+val+'">'+val+'</option>';        
    } 
    return str;
}