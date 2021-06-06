<template>
  <div class="video-wrapper">
    <video :id="videoName" class="video-bg-customize video-js vjs-default-skin videoContainer" playsinlines>
    </video>
    <a class="destory-btn" v-if="deletebutton" v-on:click="destoryVideo">
      <font-awesome-icon icon="redo" />
    </a>
  </div>
</template>

<script>    
    /* eslint-disable */
    import 'video.js/dist/video-js.css'
    import 'videojs-record/dist/css/videojs.record.css'
    import videojs from 'video.js'

    import { library } from '@fortawesome/fontawesome-svg-core'
    import { faRedo } from '@fortawesome/free-solid-svg-icons'
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import Vue from 'vue'
    
    import 'webrtc-adapter'
    import RecordRTC from 'recordrtc'

    // the following imports are only needed when you're recording
    // audio-only using the videojs-wavesurfer plugin
    /*
    import WaveSurfer from 'wavesurfer.js';
    import MicrophonePlugin from 'wavesurfer.js/dist/plugin/wavesurfer.microphone.js';
    WaveSurfer.microphone = MicrophonePlugin;

    // register videojs-wavesurfer plugin
    import videojs_wavesurfer_css from 'videojs-wavesurfer/dist/css/videojs.wavesurfer.css';
    import Wavesurfer from 'videojs-wavesurfer/dist/videojs.wavesurfer.js';
    */

    import Record from 'videojs-record/dist/videojs.record.js'

    library.add(faRedo)
    Vue.component('font-awesome-icon', FontAwesomeIcon)

    export default {
      name: 'VideoTag',
      props: ['uploadUrl', 'videoName', 'formId', 'source'],
      data() {
          return {
              deletebutton : false,
              player: '',
              options: {
                  controls: true,
                  autoplay: this.source ? true : false,
                  fluid: false,
                  loop: false,
                  bigPlayButton: false,
                  controlBar: {
                      volumePanel: false
                  },
                  video: {facingMode: 'environment'                                     
                         },
                  src : this.source,
                  sources : this.source ? [{
                    src : this.source,
                    type : 'video/' + this.source.split('.').pop()
                  }] : [],
                  plugins: {
                      /*
                      // this section is only needed when recording audio-only
                      wavesurfer: {
                          backend: 'WebAudio',
                          waveColor: '#36393b',
                          progressColor: 'black',
                          debug: true,
                          cursorWidth: 1,
                          displayMilliseconds: true,
                          hideScrollbar: true,
                          plugins: [
                              // enable microphone plugin
                              WaveSurfer.microphone.create({
                                  bufferSize: 4096,
                                  numberOfInputChannels: 1,
                                  numberOfOutputChannels: 1,
                                  constraints: {
                                      video: false,
                                      audio: true, 
                                      video: {
                                                facingMode: 'environment'
                                              }                                     
                                  }
                              })
                          ]
                      },
                      */
                      // configure videojs-record plugin
                      record: {
                          audio: false,
                          video: true,                                  
                          maxLength : 300,
                          videoMimeType: 'video/mp4',
                          debug: true,
                          video: {
                                    facingMode: 'environment' 
                                 }
                      }
                  }
              }
          };
      },
      mounted() {

          /* eslint-disable no-console */
          this.player = videojs(`#${this.videoName}`, this.options, () => {
              // print version information at startup
              var msg = 'Using video.js ' + videojs.VERSION +
                  ' with videojs-record ' + videojs.getPluginVersion('record') +
                  ' and recordrtc ' + RecordRTC.version;
              videojs.log(msg);
              console.log(this.player)
          });

          // device is ready
          this.player.on('deviceReady', () => {
          });

          // user clicked the record button and started recording
          this.player.on('startRecord', () => {
          });

          // user completed recording and stream is available
          this.player.on('finishRecord', () => {
            // the blob object contains the recorded data that
            // can be downloaded by the user, stored on server etc.
            
            var data = this.player.recordedData;
            var formData = new FormData();

            var dataName =  data.name;
            dataName = dataName.split('.').slice(0, -1).join('.') + '.mp4'

            console.log(dataName)

            formData.append('fileType', this.videoName)
            formData.append('video', data, this.videoName + dataName);


            this.player.record().stopDevice();

            fetch(this.uploadUrl, {
              method: 'POST',
              body: formData,
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept' : 'application/json'
              }
            }).then(response => {
              if (response.ok) {
                response.json().then(data => {
                  console.log(data);
                  document.getElementById(this.formId).setAttribute('value', data.filePath)
                });
              }
            }).catch(
              error =>{
                console.error('an upload error occurred!');
              }
            );

            this.deletebutton = true;
            console.log('finished recording: ', this.player.recordedData);
          });

          // error handling
          this.player.on('error', (element, error) => {
              console.warn(error);
          });

          this.player.on('deviceError', () => {
              console.error('device error:', this.player.deviceErrorCode);
          });
      },
      methods : {
          /* destory the record video as it initialized */
          destoryVideo : function() {
            document.getElementById(this.formId).setAttribute('value', '')
            this.player.record().reset();
            this.deletebutton = false;
            console.log(this.player);
          }
      },
      beforeDestroy() { 
          if (this.player) {
              this.player.dispose();
          }
      }
    }
</script>

<style>
  .videoContainer {
    width  : auto !important;
    height : 100% !important;
  }
  /* change player background color */
  .video-bg-customize {
    background-color: #95DDF5;
  }

  .video-wrapper {
    position : relative;
    width : 100%;
    height : 100%;
  }
  .destory-btn {
    position : absolute;
    top : 0px;
    right : 0px;
    text-align: center;
    width : auto;
    height : 30px;
    width  :30px;
    display : flex;
    align-items : center;
    justify-content : center;
    color : white;
    background-color: rgba(43, 51, 63, 0.7)
  }
</style>