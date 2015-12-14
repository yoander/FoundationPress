(function() {

   // Set to the number of columns in your layout
   var numCols = 12;

   // Populate column values
   var colValues = [];

   for (var i = 0; i <= numCols; i++) {
      colValues.push({text: i.toString(), value: i.toString()})
   }

   // TinyMCE functionality
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
                        editor.windowManager.open( {
                           title: 'Insert Columns',
                           body: [
                             {
                                 type: 'listbox',
                                 name: 'smlCol',
                                 label: 'Small Columns',
                                 values: colValues
                              },
                              {
                                 type: 'listbox',
                                 name: 'medCol',
                                 label: 'Medium Columns',
                                 values: colValues
                              },
                              {
                                  type: 'listbox',
                                  name: 'lrgCol',
                                  label: 'Large Columns',
                                  values: colValues
                               }
                           ],
                           onsubmit: function(e) {
                              // Build the column shortcode string
                              var colString = '[fdn-col';

                              if (e.data.smlCol != '0') {
                                 colString += ' sml="' + e.data.smlCol + '"';
                              }

                              if (e.data.medCol != '0') {
                                 colString += ' med="' + e.data.medCol + '"';
                              }

                              if (e.data.lrgCol != '0') {
                                 colString += ' lrg="' + e.data.lrgCol + '"';
                              }

                              colString += '][/fdn-col]';

                              // Print shortcode string to the editor
                              editor.insertContent(colString);
                           }
                        });
                     }
                  }
               ] // Grid Submenu 
            }
         ] // Main Menu
      });
   });
})();