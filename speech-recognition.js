var recognition = new webkitSpeechRecognition();
recognition.continuous = true;
recognition.interimResults = true;
recognition.lang = "en-US";

recognition.onerror = function(event) {
    console.error(event);
};

recognition.onstart = function() {
    console.log('Speech recognition service has started');
};

recognition.onend = function() {
    console.log('Speech recognition service disconnected');
};

recognition.onresult = function(event) {
    var interim_transcript = '';
    var final_transcript = '';

    for (var i = event.resultIndex; i < event.results.length; ++i) {
        // Verify if the recognized text is the last with the isFinal property
        if (event.results[i].isFinal) {
            final_transcript += event.results[i][0].transcript;
        } else {
            interim_transcript += event.results[i][0].transcript;
        }
    }

    // Choose which result may be useful for you

    console.log("Interim: ", interim_transcript);

    console.log("Final: ",final_transcript);

    console.log("Simple: ", event.results[0][0].transcript);
};

recognition.start();