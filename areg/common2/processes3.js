function formSubmit(){document.getElementById("registration").submit();}

//processes
var vinArray = new Array();
var foundDuplicate= '';
var typeElement = '';

// check to see if number
function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

// runs a function passed as a string
function runFunction(name, arguments)
{
    var fn = window[name];
    if(typeof fn !== 'function') {
        alert(name+' Not a valid function');
        return;
    }
    fn.apply(window, arguments);
}

//removed validation snippet

function playSound(sound) {
    if (sound<='') return;
    var soundElement = document.getElementById("soundElement");
    if (typeof soundElement.id == '') return; // missing the index.html stuff - please place the following line in body section of the doc
                                                // <span id="soundElement"></span>
    var soundfile = '../../sounds/'+sound;
    soundElement.innerHTML= "<embed src=\""+soundfile+"\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
}
function userMessage(message,sound,visual) {
    lblUserMessage.innerHTML = message;
        if (typeof boxVisualSignal !='undefined') { // dimm them
        imgFailureSignal.style.opacity = '.1';
        imgWarningSignal.style.opacity = '.1';
        imgInfoSignal.style.opacity = '.1';
        imgSuccessSignal.style.opacity = '.1';
    }
    if (visual != null) {
	if (visual==1) alert(message); // failures are alerted also
        imgFailureSignal.style.opacity = visual==1?'.6':'.1';
        imgWarningSignal.style.opacity = visual==2?'.6':'.1';
        imgInfoSignal.style.opacity = visual==3?'.6':'.1';
        imgSuccessSignal.style.opacity = visual==4?'.6':'.1';
    }
}

//document.getElementById("Label1"). innerHTML 
//document.getElementById("Label1").innerText

//function checkEnter(e){
 //e = e || event;
 //var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
 //return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
//}
//document.querySelector('registration').onkeypress = checkEnter;





//
function replaceString(inString,fromC,toC) {
        var newString = '';
        var a = inString.split(fromC);
        var i = 0;
        var delim = '';
        for (i=0;i<=a.length;i++) {
             if (i>0) delim = toC;
             newString = newString+delim+a[i];
        }
        return newString;
}


function include(filename)
{
	var head = document.getElementsByTagName('head')[0];
	script = document.createElement('script');
	script.src = filename;
	script.type = 'text/javascript';
	
	head.appendChild(script)
}


function vinCheckDigit(vin) {
    var checkDigitOk = false;
    var transVin = '';
    var transliteratedChars = { 'A':1, 'B':2, 'C':3, 'D': 4, 'E':5, 'F':6, 'G':7, 'H':8 ,
                            'J':1, 'K':2, 'L':3, 'M': 4, 'N':5, 'P':7, 'R':9,
                            'S':2, 'T':3, 'U': 4, 'V':5, 'W':6, 'X':7, 'Y':8 ,'Z':9};
                            
    var weight = [8,7,6,5,4,3,2,10,0,9,8,7,6,5,4,3,2];
    
    for (i=0;i<vin.length;i++) {
        var charIndex = vin.substring(i,i+1);
        if (i == 8) charIndex = '0';
        if (charIndex >= 'A' && charIndex <='Z') {
            var numForChar = transliteratedChars[charIndex];
            //alert(charIndex+', '+numForChar);
            if (typeof(numForChar) != 'undefined') {
                transVin = transVin+numForChar;
            }
            else {
                checkDigitOk = false;
                break;
            }
        }
        else {
           transVin = transVin+charIndex; 
        }
        //alert(checkDigitOk);
    }
    var checkDigit = 0;
    for (i=0;i<transVin.length;i++) {
        checkDigit = checkDigit + (transVin.substring(i,i+1)*weight[i]);
    }
    checkDigit = checkDigit%11;
    if (checkDigit == 10) checkDigit = 'X';
    checkDigitOk = checkDigit == vin.substring(8,9);
    //alert(checkDigit);
    return checkDigitOk;
   //return transVin;
}

function getVehYear(vin) {
    var modelYear = vin.substring(9,10);
    var modelYear = modelYear.toUpperCase();
    var yearIndex = vin.substring(6,7);
    yearIndex = yearIndex.toUpperCase();
    var vehYear = '?';
    if (yearIndex >= 'A' && yearIndex <='Z') {
        var years = { 'A':2010, 'B':2011, 'C':2012, 'D': 2013, 'E':2014, 'F':2015, 'G':2016, 'H':2017 ,
                            'J':2018, 'K':2019, 'L':2020, 'M': 2021, 'N':2022, 'P':2023, 'R':2024,
                            'S':2025, 'T':2036, 'V':2027, 'W':2028, 'X':2029, 'Y':2030 ,
                            '1':2031, '2':2032, '3': 2033, '4':2034, '5':2035, '6':2036,
                            '7':2037 ,'8':2038, '9':2039 };
        vehYear = years[modelYear];
        if (typeof(vehYear) != 'undefined') {
            return vehYear;
        }
        else {
            return '?';
        }
    }
    else { // numeric - use the array below
        var years = { 'A':1980, 'B':1981, 'C':1982, 'D': 1983, 'E':1984, 'F':1985, 'G':1986, 'H':1987 ,
                            'J':1988, 'K':1989, 'L':1990, 'M': 1991, 'N':1992, 'P':1993, 'R':1994,
                            'S':1995, 'T':1996, 'V':1997, 'W':1998, 'X':1999, 'Y':2000 ,
                            '1':2001, '2':2002, '3': 2003, '4':2004, '5':2005, '6':2006,
                            '7':2007 ,'8':2008, '9':2009 };
        vehYear = years[modelYear];
        if (typeof(vehYear) != 'undefined') {
            return vehYear;
        }
        else {
            return '?';
        }
    }
}
function getVehCountry(code) {
    var countries = { '1':'USA', '2':'CAN', '3':'USA', '4':'USA', '5': 'USA', 'S':'EURS', 'U':'EURU', 'V':'EURV',
                    'W':'GER' ,'X':'EURX', 'Y':'EURY', 'Z':'EURZ', 'J': 'JPN', 'K':'ASIAK','L':'CHN'};
    var ccode = countries[code.substring(0,1)];
    if (typeof(ccode) == 'undefined') return '!';
    
    switch (ccode) {
        case 'USA': 
        case 'CAN':
        case 'GER':
        case 'JPN':
        case 'CHN': return ccode; break;
        case 'EURS': {
            var ccode2 = code.substring(1);
            if (ccode2 >= 'A' && ccode2 <= 'M') {
                return 'UK';
            }
            else if (ccode >= 'N' && ccode2 <= 'T') {
                return 'GER';
            }
            else {
                return ccode+'?';
            }
            break;
        }
        case 'EURU': {
            var ccode2 = code.substring(1);
            if (ccode2 >= 'H' && ccode2 <= 'M') {
                return 'DEN';
            }
            else if (ccode >= 'N' && ccode2 <= 'T') {
                return 'IR';
            }
            else {
                return ccode+'?';
            }
            break;
        }
        case 'EURV': {
            var ccode2 = code.substring(1);
            if (ccode2 >= 'A' && ccode2 <= 'E') {
                return 'AUT';
            }
            else if (ccode >= 'F' && ccode2 <= 'R') {
                return 'FRA';
            }
            else if (ccode >= 'S' && ccode2 <= 'W') {
                return 'SPA';
            }
            else {
                return ccode+'?';
            }
            break;
        }
        case 'EURX': {
            var ccode2 = code.substring(1);
            if (ccode2 >= 'L' && ccode2 <= 'R') {
                return 'HOL';
            }
            else {
                return ccode+'?';
            }            
            break;
        }
        case 'EURY': {
            var ccode2 = code.substring(1);
            if (ccode2 >= 'F' && ccode2 <= 'K') {
                return 'FIN';
            }
            else if (ccode >= 'S' && ccode2 <= 'W') {
                return 'SWE';
            }
            else {
                return ccode+'?';
            }
            break;
        }
        case 'EURZ': {
            var ccode2 = code.substring(1);
            if (ccode2 >= 'A' && ccode2 <= 'R') {
                return 'ITA';
            }
            else {
                return ccode+'?';
            }                   
            break;
        }
        case 'ASIAK': {
            var ccode2 = code.substring(1);
            if (ccode2 >= 'K' && ccode2 <= 'R') {
                return 'KOR';
            }
            else {
                return ccode+'?';
            }
            break;
        } 
        default: return ccode+'!';
    }
}
function getVehMake(country,mfg) {
    var make = '?';
    switch (country) {
        case 'USA': {
            var mfgs = {'9U': 'Acura', 'A4': 'Chrysler', 'A8': 'Chrysler', 'AC': 'AMC', 'AM': 'AMC', 'B3': 'Dodge', 'B4': 'Dodge', 'B6': 'Dodge', 'B7': 'Dodge', 'B7': 'Dodge', 'C4': 'Chrysler', 'C8': 'Chrysler', 'D4': 'Dodge', 'D5': 'Dodge', 'D7': 'Dodge', 'D8': 'Dodge', 'EC': 'Fleetwood', 'F1': 'Ford', 'F6': 'Ford', 'FA': 'Ford', 'FB': 'Ford', 'FC': 'Ford', 'FD': 'Ford', 'FE': 'Ford', 'FM': 'Ford', 'FT': 'Ford',  'G3': 'Oldsmobile', 'G4': 'Buick','G6': 'Cadillac', 'G8': 'Saturn', 'GA': 'Chevrolet','GE': 'Cadillac', 'GG': 'Isuzu', 'GH': 'Oldsmobile', 'GJ': 'GMC', 'GK': 'GMC', 'GM': 'Pontiac', 'GN': 'Chevrolet', 'GT': 'GMC', 'GY': 'Cadillac', 'HG': 'Honda', 'J4': 'Jeep', 'J7': 'Jeep', 'J8': 'Jeep', 'JC': 'Jeep', 'JD': 'AMC', 'JT': 'Jeep', 'L1': 'Lincoln', 'LN': 'Lincoln', 'ME': 'Mercury', 'MR': 'Lincoln', 'N4': 'Nissan', 'N6': 'Nissan', 'N9': 'Neoplan', 'NK': 'Kenworth', 'NP': 'Peterbilt', 'NX': 'Toyota', 'P3': 'Plymouth', 'P4': 'Plymouth', 'P7': 'Plymouth', 'P9': 'Panoz', 'RF': 'Roadmaster', 'S9': 'Saleen', '77': 'Thomas', 'T8': 'Thomas', 'TU': 'TMC', 'V1': 'Volkswagen', 'VW': 'Volkswagen', 'WA': 'Autostar', 'WB': 'Autostar', 'WU': 'White Volvo', 'WV': 'Winnebago', 'XK': 'Kenworth', 'XM': 'AMC', 'XP': 'Peterbilt', 'Y1': 'Geo', 'YV': 'Mazda', 'Z3': 'Mitsubishi', 'Z5': 'Mitsubishi', 'Z7': 'Mitsubishi', 'ZV': 'Ford', 'ZW': 'Mercury', 'J4':'Jeep','C3':'Chrysler','D3':'Dodge','G1':'Chevrolet', 'G2':'Pontiac','G0':'GMC', 'G5':'GMC','GB':'Chevrolet', 'GC':'Chevrolet', 'GD':'GMC', 'FG':'Ford','FM':'Ford','FT':'Ford','JG':'Mercedes-Benz', 'T1':'Toyota','T2':'Lexus'};
            
            make = mfgs[mfg];
            if (typeof(make) == 'undefined') make = '';
            break;
        }
        case 'CAN': {
            var mfgs ={'B3':'Dodge', 'B4':'Dodge', 'B5':'Dodge', 'B6':'Dodge', 'B7':'Dodge', 'B8':'Dodge', 'BC':'Jeep', 'C1':'Geo', 'C3':'Chrysler', 'C4':'Chrysler','C7':'Pontiac','C8':'Chrysler','CC':'Eagle','CK':'Pontiac','CM':'AMC','CN':'Geo','D4':'Dodge','D6':'Dodge','D7':'Dodge','D8':'Dodge','00':'Eagle','FA':'Ford','FD':'Ford','FM':'Ford','FT':'Ford','FU':'Freightliner','FV':'Freightliner','FW':'Sterling','FZ':'Sterling','G0':'GMC','G1':'Chevrolet','G2':'Pontiac','G3':'Oldsmobile','G4':'BuickX','G5':'GMC','G7':'Pontiac','G8':'Chevrolet','GA':'Chevrolet','GB':'Chevrolet','GD':'GMC','GJ':'GMC','GK':'GMC','GN':'Chevrolet','GT':'GMC','HG':'Honda','HH':'Acura','HJ':'Honda','HK':'Honda','HM':'Hyundai','HN':'Acura','HS':'International','HT':'International','J4':'Jeep','LM':'Lincoln','M2':'Mack','ME':'Mercury','MH':'Mercury','MR':'Mercury','NK':'Kenworth','NP':'Peterbilt','P3':'Plymouth','P4':'Plymouth','P5':'Plymouth','P9':'Prevost','PC':'Prevost','S2':'Suzuki','S3':'Suzuki','T1':'Toyota','T2':'Lexus','WK':'WesternStarTrucks','WL':'WesternStarTrucks','XK':'Kenworth','XM':'Eagle','XP':'Peterbilt'};
            
            make = mfgs[mfg];
            if (typeof(make) == 'undefined') make = '';
            break;
        }
        case 'GER': {
            var mfgs = {'AG':'Neoplan', 'AU':'Audi','BA':'BMW', 'BS':'BMW M',
            'DB':'Mercedes-Benz', 'DC':'DaimlerChrysler', 'DD':'Mercedes-Benz', 'EB':'Evobus','FO':'Ford Germany',
            'MA':'MAN Germany', 'MW':'MINI', 'PO':'Porsche', 'OL':'Opel','VW':'VolksWagon','V1':'VolksWagon','V2':'VolksWagon'};
            
            make = mfgs[mfg];
            if (typeof(make) == 'undefined') make = '';
            break;        
            break;
        }
        case 'JPN': {
            var mfgs = {'A3':'Mitsubishi', 'A':'Isuzu','F':'Subaru', 'H':'Honda', 'K':'Kawasaki', 'M':'Mazda', 'N':'Nissan', 'S':'Suzuki', 'T':'Toyota', 'TH':'Lexus', '81' : 'Chevrolet','87' : 'Isuzu', '8B' : 'Chevrolet','8D' : 'GMC','8Z' : 'Chevrolet', 'A4' : 'Mitsubishi', 'A7' : 'Mitsubishi', 'AA' : 'Isuzu', 'AB' : 'Isuzu', 'AC' : 'Isuzu', 'AE' : 'Acura', 'AL' : 'Isuzu', 'B3' : 'Dodge', 'B4' : 'Dodge', 'B7' : 'Dodge', 'C2' : 'Ford', 'D1' : 'Daihatsu', 'D2' : 'Daihatsu', 'E3' : 'Eagle', 'F1' : 'Subaru', 'F2' : 'Subaru', 'F3' : 'Subaru', 'F4' : 'Saab', 'G1' : 'Chevrolet', 'G7' : 'Pontiac', 'GC' : 'Geo', 'H4' : 'Acura', 'HB' : 'Hino', 'HL' : 'Honda', 'HM' : 'Honda', 'J3' : 'Chrysler', 'L6' : 'Mitsubishi', 'LS' : 'Sterling', 'M1' : 'Mazda', 'M2' : 'Mazda', 'M3' : 'Mazda', 'N1' : ' Nissan', 'N3' : 'Nissan', 'N4' : 'Nissan', 'N6' : ' Nissan', 'N8' : 'Nissan', 'NA' : 'Nissan', 'NK' : 'Infiniti', 'NR' : 'Infiniti', 'NX' : 'Infiniti', 'P3' : 'Plymouth', 'P4' : 'Plymouth', 'P7' : 'Plymouth', '2X' : 'Isuzu', 'S2' : 'Suzuki', 'S3' : 'Suzuki', 'S4' : 'Suzuki', 'T2' : 'Toyota', 'T3' : 'Toyota', 'T4' : 'Toyota', 'T5' : 'Toyota', 'T6' : 'Lexus', 'T8' : 'Lexus', 'TD' : 'Toyota', 'TE' : 'Toyota', 'TJ' : 'Lexus', 'TK' : 'Scion', 'TL' : 'Scion', 'TM' : 'Toyota', 'TN' : 'Toyota', 'W6' : 'Mitsubishi', 'W7' : 'Mitsubishi'};
            
            make = mfgs[mfg];
            if (typeof(make) == 'undefined') make = mfgs[mfg.substring(0,1)];
            if (typeof(make) == 'undefined') make = '';      
            break;
        }
        case 'ITA': {
            var mfgs = {'FF':'Ferrari', 'HW':'Lamborghini','FA':'Fiat','AM':'Maserati','AR':'Alpha Romeo'};
            
            make = mfgs[mfg];
            if (typeof(make) == 'undefined') make = '';
            break;
        }
        default: make = '';
    }
    return make;
}

function getVehModel(make,vin) {
    if (make <= '') return '';
    var model = '';
    switch (make) {
        case 'Mercedes-Benz': {
            var models = {'L':'CLK','W':'SLK','C':'R'}
            model = models[vin.substring(4,5)];
            break;
        }
    }
    return model;
}
//is there a second one of these?
function processVIN(vin) {
    userMessage('processin '+vin+' - length: '+vin.length);
    if (vin.length < 17) {
        //userMessage('invalid VIN - length is: '+vin.length+' - should be 17!','warning');
        return [-1];
    }
    vin = vin.toUpperCase();
   // alert(vin);
    // do checkdigit test
    var validVin = vinCheckDigit(vin);
    if ( !validVin) {
        //userMessage('CheckDigit error - VIN as entered is invalid.','warning');
	return [-2];
    }
    // get the info
    var year = getVehYear(vin);
    var country = getVehCountry(vin.substring(0,2));
    var make = getVehMake(country,vin.substring(1,3));
    var model = getVehModel(make,vin);

    //document.getElementById('txtYearNew').value = year;
    //document.getElementById('txtMakeNew').value = make;
    //document.getElementById('txtModelNew').value = model;
    //document.getElementById('txtCountry').innerText = country;
    return [year,make,model,country];
}
// VIN STUFF

function getVehModel(make,vin) {
    if (make <= '') return '';
    var model = '';
    switch (make) {
        case 'Mercedes-Benz': {
            var models = {'L':'CLK','W':'SLK','C':'R'}
            model = models[vin.substring(4,5)];
            break;
        }
    }
    return model;
}

//check for duplicate vin and turn background yellow if it is duplicate
function duplicateVIN(vin) {
    if (foundDuplicate>'') document.getElementById(foundDuplicate).style.backgroundColor = 'white';
    var foundIt = false;
    var i = 0;
    for (i=0;i<vinArray.length;i++) {
        foundIt = vinArray[i]==vin;
        if (foundIt) {
            foundDuplicate = 'txtVIN'+(i+1);
            break;
        }
    }
    if (foundIt) document.getElementById(foundDuplicate).style.backgroundColor = 'lightyellow';
    return foundIt;
}
//take foundIt from duplicateVIN and hold focus for five seconds if it is a duplicate -
function txtVin_OnBlurHandler(event)
{
	var vin = event.target.value;
    if (duplicateVIN(vin)) {
        userMessage(vin+' is already entered.','failure');
        event.target.style.backgroundColor = 'lightyellow';
        setTimeout(function(){event.target.focus()},5);
        return;
    }
    if (foundDuplicate>'') document.getElementById(foundDuplicate).style.backgroundColor = 'white';
    foundDuplicate = '';
           
	var id = event.target.id;
	var idx = id.substring(6,id.length);
    var vinInfo = processVIN(vin);
    if (vinInfo.length > 1) {
        userMessage('');
        var fieldNum = event.target.id.substring(6);
		document.getElementById('txtYear'+fieldNum).value = vinInfo[0];
        document.getElementById('txtMake'+fieldNum).value = vinInfo[1];
        document.getElementById('txtModel'+fieldNum).value = typeof vinInfo[2] == 'undefined'?'':vinInfo[2];
        event.target.style.backgroundColor = 'white';
        vinArray[vinArray.length] = vin;
    }
    else {
        var err = vinInfo[0];
        if (err == -1) userMessage('Warning - VIN is less than 17 characters!','warning');
        else if (err == -2) userMessage('CheckDigit Error - invalid VIN Entered.','warning');
        else userMessage('Invalid VIN Entered.','warning');
        event.target.style.backgroundColor = 'pink';
    }
}


//validate date
function ValidateDate_OnChangeHandler(event)
{
   if(!calendarValidDate(event.target.value,'MM/DD/YYYY')){
		alert('Invalid date: ' + event.target.value + '!');
		event.target.value = '';
		setTimeout(function(){event.target.focus()},10);
   }
}

// escaping special characters in a json string
String.prototype.escapeSpecialChars = function() {
    return this.replace(/[\\]/g, '\\\\')
    .replace(/[\#]/g, '\\\#')
    .replace(/[\"]/g, '\\\"') //" a comment to get around the bug in js editor for dashcode that gets confused
    .replace(/[\']/g, "\\\'")
    .replace(/[\&]/g, '\\\&')
    .replace(/[\/]/g, '\\/')
    .replace(/[\b]/g, '\\b')
    .replace(/[\f]/g, '\\f')
    .replace(/[\n]/g, '\\n')
    .replace(/[\r]/g, '\\r')
    .replace(/[\t]/g, '\\t');
}
//function clickcheck(){
//var el = document.getElementById("Check");
//if (el.addEventListener)
//    el.addEventListener("click", validateTopFields, false);
//else if (el.attachEvent)
//    el.attachEvent('onclick', validateTopFields);
//}

//removed validation snippet 2
//the end