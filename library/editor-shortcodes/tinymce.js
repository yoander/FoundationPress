(function() {
   tinymce.PluginManager.add('foundationpress_shortcodes', function(editor, url) {
      editor.addButton('foundationpress_shortcodes', {
         title: 'FoundationPress',
         type: 'menubutton',
         icon: 'wp_code',
         menu: [
            {
               text: 'Grid',
               value: '[fdn-row][/fdn-row]',
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
               ] // Grid Submenu 
            }
         ] // Main Menu
      });
   });
})();