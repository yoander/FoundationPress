(function() {
   tinymce.PluginManager.add('foundationpress', function(editor, url) {
      editor.addButton('foundationpress', {
         title: 'FoundationPress',
         type: 'menubutton',
         icon: 'wp_code',
         menu: [
            {
               text: 'Grid',
               value: '[fdn-row][/fdn-row]',
               onclick: function() {
                  editor.insertContent(this.value());
               },
               menu: [
                  {
                     text: 'Row',
                     value: '[fdn-row][/fdn-row]',
                     onclick: function(e) {
                        e.stopPropagation();
                        editor.insertContent(this.value());
                     }
                  },
                  {
                     text: 'Column',
                     value: '[fdn-col][/fdn-col]',
                     onclick: function(e) {
                        e.stopPropagation();
                        editor.insertContent(this.value());
                     }
                  }
               ]
            }
         ]
      });
   });
})();