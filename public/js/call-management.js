//=======================基本設定部

//再生ボタン
const record = document.querySelector('.record');
//停止ボタン
const stop = document.querySelector('.stop');
//おそらく録音ファイル
const soundClips = document.querySelector('.sound-clips');
//ビットマップ
const canvas = document.querySelector('.visualizer');
//レコーダー自体クラス
const mainSection = document.querySelector('.main-controls');
// 録音していないときに停止ボタンを無効にする
stop.disabled = true;
//ビットマップの設定
let audioCtx;
//グラフィックキャンパス要素
const canvasCtx = canvas.getContext("2d");

//=====================レコーディング部

//メディア入力を使用する許可を求める
if (navigator.mediaDevices.getUserMedia) {

    console.log('getUserMedia supported.');
    //初期化
    const constraints = { audio: true };
    let chunks = [];

    //成功した場合
    let onSuccess = function(stream) {
        const mediaRecorder = new MediaRecorder(stream);

        visualize(stream);

        //録音ボタンを押す
        record.onclick = function() {
        mediaRecorder.start();
        console.log(mediaRecorder.state);
        console.log("recorder started");
        record.style.background = "red";

        stop.disabled = false;
        record.disabled = true;
        }
        //停止ボタンを押す
        stop.onclick = function() {
        mediaRecorder.stop();
        console.log(mediaRecorder.state);
        console.log("recorder stopped");
        record.style.background = "";
        record.style.color = "";
        // mediaRecorder.requestData();

        stop.disabled = true;
        record.disabled = false;
        }

        //録音→停止を押すと表示
        mediaRecorder.onstop = function(e) {
        console.log("data available after MediaRecorder.stop() called.");

        //ファイル名をユーザーに聞く
        const clipName = prompt('録音を保存しますか?','My unnamed clip');

        const clipContainer = document.createElement('article');
        const clipLabel = document.createElement('p');
        const audio = document.createElement('audio');
        const deleteButton = document.createElement('button');

        clipContainer.classList.add('clip');
        audio.setAttribute('controls', '');
        deleteButton.textContent = 'Delete';
        deleteButton.className = 'delete';

        //録音ファイルがあった場合にはファイル名を表示させる
        if(clipName === null) {
            clipLabel.textContent = 'My unnamed clip';
        } else {
            clipLabel.textContent = clipName;
        }
        //親ノードの子ノードリストに追加して行く
        clipContainer.appendChild(audio);
        clipContainer.appendChild(clipLabel);
        clipContainer.appendChild(deleteButton);
        soundClips.appendChild(clipContainer);


        audio.controls = true;
        const blob = new Blob(chunks, { 'type' : 'audio/ogg; codecs=opus' });
        chunks = [];
        const audioURL = window.URL.createObjectURL(blob);
        audio.src = audioURL;
        console.log("recorder stopped");

        deleteButton.onclick = function(e) {
            let evtTgt = e.target;
            evtTgt.parentNode.parentNode.removeChild(evtTgt.parentNode);
        }

        //録音ファイルを押すと名前の変更をする
        clipLabel.onclick = function() {
            const existingName = clipLabel.textContent;
            const newClipName = prompt('名前の変更をしますか?');
            if(newClipName === null) {
            clipLabel.textContent = existingName;
            } else {
            clipLabel.textContent = newClipName;
            }
        }
        }

        mediaRecorder.ondataavailable = function(e) {
        chunks.push(e.data);
        }
    }
    //エラーログ
    let onError = function(err) {
        console.log('The following error occured: ' + err);
    }

    navigator.mediaDevices.getUserMedia(constraints).then(onSuccess, onError);

} else {
    //エラーログ
    console.log('getUserMedia not supported on your browser!');
}

//おそらくグラフィックキャンバス関数
function visualize(stream) {
    if(!audioCtx) {
        audioCtx = new AudioContext();
    }

    const source = audioCtx.createMediaStreamSource(stream);

    const analyser = audioCtx.createAnalyser();
    analyser.fftSize = 2048;
    const bufferLength = analyser.frequencyBinCount;
    const dataArray = new Uint8Array(bufferLength);

    source.connect(analyser);
    //analyser.connect(audioCtx.destination);
    console.log('=========')
    draw();

    //アニメーションを描画する関数
    function draw() {
    const WIDTH = canvas.width
    const HEIGHT = canvas.height;

    requestAnimationFrame(draw);

    analyser.getByteTimeDomainData(dataArray);

    canvasCtx.fillStyle = 'rgb(200, 200, 200)';
    canvasCtx.fillRect(0, 0, WIDTH, HEIGHT);

    canvasCtx.lineWidth = 2;
    canvasCtx.strokeStyle = 'rgb(0, 0, 0)';

    canvasCtx.beginPath();

    let sliceWidth = WIDTH * 1.0 / bufferLength;
    let x = 0;


    for(let i = 0; i < bufferLength; i++) {

    let v = dataArray[i] / 128.0;
    let y = v * HEIGHT/2;

    if(i === 0) {
        canvasCtx.moveTo(x, y);
    } else {
        canvasCtx.lineTo(x, y);
    }

    x += sliceWidth;
    }

    canvasCtx.lineTo(canvas.width, canvas.height/2);
    canvasCtx.stroke();

    }
}

window.onresize = function() {
canvas.width = mainSection.offsetWidth;
}

window.onresize();
