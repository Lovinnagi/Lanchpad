(function() {
   tinymce.create('tinymce.plugins.shortbtn', {
      init : function(ed, url) {
         ed.addButton('shortbtn', {
            title : 'Add Button',
            image : url+'/switch.png',
            onclick : function() {
               var posts = prompt("Number of posts", "1");
               var text = prompt("List Heading", "This is the heading text");

               if (text != null && text != ''){
                  if (posts != null && posts != '')
                     ed.execCommand('mceInsertContent', false, '[recent-posts posts="'+posts+'"]'+text+'[/recent-posts]');
                  else
                     ed.execCommand('mceInsertContent', false, '[recent-posts]'+text+'[/recent-posts]');
               }
               else{
                  if (posts != null && posts != '')
                     ed.execCommand('mceInsertContent', false, '[recent-posts posts="'+posts+'"]');
                  else
                     ed.execCommand('mceInsertContent', false, '[recent-posts]');
               }
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Shortcode Button",
            author : 'Colourcode',
            authorurl : 'http://www.colourcode.hk',
            infourl : '',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('shortbtn', tinymce.plugins.shortbtn);
})();