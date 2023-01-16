function validate_ip_address(v) {
    var format = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
    if (v.match(format)) {
        return true;
    }
    
    return false;
}

function validate_url(v) {
    var format = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
    if (v.match(format)) {
        return true;
    }
    
    return false;    
}

function validate_domain(v) {
    var format = /^(?!:\/\/)([a-zA-Z0-9]+\.)?[a-zA-Z0-9][a-zA-Z0-9-]+\.[a-zA-Z]{2,6}?$/i;
    if (v.match(format)) {
        return true;
    }
    
    return false;    
}

function validate_email(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function get_format_name(v) {
    var r = "";
    
    if (v=="all") {
        r = "*";
    } else if (v=="archive_all") {
        r = "Archive";
    } else if (v=="cad_all") {
        r = "CAD";
    } else if (v=="font_all") {
        r = "Font";
    } else if (v=="document_all") {
        r = "Document";
    } else if (v=="image_all") {
        r = "Image";
    } else if (v=="audio_all") {
        r = "Audio";
    } else if (v=="video_all") {
        r = "Video";
    } else {
        r = v.toUpperCase();
    }
        
    return r;
}
