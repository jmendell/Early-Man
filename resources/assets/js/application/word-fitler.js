String.prototype.contains = function(str) { return this.indexOf(str) != -1; };

var containsProfanity = function(text){
    var returnVal = false; 
    for (var i = 0; i < profanities.length; i++) {
        if(text.toLowerCase().contains(profanities[i].toLowerCase())){
            returnVal = true;
            break;
        }
    }
    return returnVal;
}