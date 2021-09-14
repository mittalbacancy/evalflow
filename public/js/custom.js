var endYear = 2019;

function jsGetStartYear(){
	var d = new Date();
	var month = d.getMonth();
	var date = d.getDate();
	var startYear = '';
	if ( parseInt(d.getMonth()) <= 6 && parseInt(d.getDate()) <= 24){
        //startYear = parseInt(d.getFullYear());
        startYear = (parseInt(d.getFullYear()) - 1) + '-' + parseInt(d.getFullYear());
    } else{
        //startYear = parseInt(d.getFullYear())+1;
        startYear = parseInt(d.getFullYear()) + '-' + (parseInt(d.getFullYear()) + 1);
    }
    var financial_year = startYear.split('-');
    return financial_year[0];
}
function jsGetEndYear(){	
    return endYear;    
}

function jsGetYearList(){
	var d = new Date();
	var month = d.getMonth();
	var date = d.getDate();	
	if ( parseInt(d.getMonth()) <= 6 && parseInt(d.getDate()) <= 24){
        //startYear = parseInt(d.getFullYear());
        financial_year = (parseInt(d.getFullYear()) - 1) + '-' + parseInt(d.getFullYear());
    } else{
        //startYear = parseInt(d.getFullYear())+1;
        financial_year = parseInt(d.getFullYear()) + '-' + (parseInt(d.getFullYear()) + 1);
    }
    var financial_year = financial_year.split('-'); 
    console.log(financial_year);  
	//console.log(financial_year[1]);
	var str = '';
	for(var i = financial_year[1]; i > endYear;i--) {
		var val = (i-1) + '-' + i ;
 		str += '<option value="'+val+'">'+val+'</option>';        
    } 
    return str;
}