require('./bootstrap');

import Vue from 'vue'
import VideoTag from './components/VideoTag.vue';


var elementExists = document.getElementById("int_video_form"); 
if (elementExists)
  new Vue({
    render: h => h(VideoTag,{
      props : {
        uploadUrl : uploadUrl,
        source : int_video_source,
        videoName : 'int-video',
        formId : 'int_video_form'
      }
    }),
  }).$mount('#internal-video-tag');

elementExists = document.getElementById("ext_video_form"); 
if (elementExists)
  new Vue({
    render: h => h(VideoTag,{
      props : {
        uploadUrl : uploadUrl,
        source : ext_video_source,
        videoName : 'ext-video',
        formId : 'ext_video_form'
      }
    }),
  }).$mount('#external-video-tag');