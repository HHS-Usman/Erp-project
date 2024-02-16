/**
* Template Name: NiceAdmin - v2.5.0
* Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
// const righttogle = document.getElementById("right_toggle");
 // Handle dropdown item click
 
 
 //end new tab dynamically....
 let tabCount = 1;

 const data1 = `
     <form>
         <h3>Login</h3>
         <div class="mb-3">
             <label for="username" class="form-label">Username</label>
             <input type="text" class="form-control" id="username" placeholder="Enter username">
         </div>
         <div class="mb-3">
             <label for="password" class="form-label">Password</label>
             <input type="password" class="form-control" id="password" placeholder="Enter password">
         </div>
         <button type="submit" class="btn btn-primary">Login</button>
     </form>
 `;
 
 const data2 = `
     <form>
         <h3>Sign Up</h3>
         <div class="mb-3">
             <label for="newUsername" class="form-label">Username</label>
             <input type="text" class="form-control" id="newUsername" placeholder="Enter new username">
         </div>
         <div class="mb-3">
             <label for="newPassword" class="form-label">Password</label>
             <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
         </div>
         <button type="submit" class="btn btn-success">Sign Up</button>
     </form>
 `;
 const data3 = `
     This is Data 3
 `;
 const data4 = `
     This is Data 4
 `;
 const data5 = `
 This is Data 5
`;
const data6 = `
 This is Data 6
`;
const data7 = `
This is Data 7
`;
const data8 = `
This is Data 8
`;
const data9 = `
This is Data 9
`;
const data10 = `
This is Data 10
`;
const data11 = `
This is Data 11
`;
const data12 = `
This is Data 12
`;
const data13 = `
This is Data 13
`;
const data14 = `
This is Data 14
`;
 
 // Function to add a new tab dynamically
 function addTab(tabTitle, tabContent) {
     const tabId = 'tab-' + tabCount;
     const btnbutton =document.createElement('button');
     btnbutton.innerHTML = "X"
     btnbutton.setAttribute('id',"btnclose");

     // Create the tab link
     const tabLink = document.createElement('a');
     tabLink.classList.add('nav-link');
     tabLink.setAttribute('data-bs-toggle', 'tab');
     tabLink.setAttribute('href', '#' + tabId);
     tabLink.innerText = tabTitle;
     btnbutton.onclick = function(){
      tabLink.remove();
     }
     // Create the tab content
     const tabContentElement = document.createElement('div');
     tabContentElement.classList.add('tab-pane', 'fade');
     tabContentElement.setAttribute('id', tabId);
     tabContentElement.innerHTML = tabContent;

     // Add the tab link and content to the respective containers
     document.querySelector('#myTabs').appendChild(tabLink);
     document.querySelector('#myTabs').appendChild(btnbutton);
     document.querySelector('.tab-content').appendChild(tabContentElement);
     // Activate the new tab
     new bootstrap.Tab(tabLink).show();
     tabCount++;

     btnbutton.onclick = function(){
      tabLink.remove();
      tabContentElement.remove();
      btnbutton.remove();
      console.log(tabLink)
      new bootstrap.Tab(tabLink).show();
     }
 }

//  start Sidebar Toggle 
const sidebar = document.getElementById("asidecontent");
const maincontainerdiv = document.getElementById("main");
const container = document.querySelector('.sidebarleft');
const toggleSidebar = () =>{
   container.classList.toggle('active');
   maincontainerdiv.classList.toggle('removebg');

  //  maincontainerdiv.style.display = ""
   
  //  container.style.height="50dvh";
}
const container1 = document.querySelector('.sidebarright');
const toggleSidebarright = () =>{
   container1.classList.toggle('active');
   maincontainerdiv.classList.toggle('removedone');
}


(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
      select(el, all).addEventListener(type, listener)
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Sidebar toggle
   */
  if (select('.toggle-sidebar-btn')) {
    on('click', '.toggle-sidebar-btn', function(e) {
      select('body').classList.toggle('toggle-sidebar')
    })
  }

  /**
   * Search bar toggle
   */
  if (select('.search-bar-toggle')) {
    on('click', '.search-bar-toggle', function(e) {
      select('.search-bar').classList.toggle('search-bar-show')
    })
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Initiate tooltips
   */
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  /**
   * Initiate quill editors
   */
  if (select('.quill-editor-default')) {
    new Quill('.quill-editor-default', {
      theme: 'snow'
    });
  }

  if (select('.quill-editor-bubble')) {
    new Quill('.quill-editor-bubble', {
      theme: 'bubble'
    });
  }

  if (select('.quill-editor-full')) {
    new Quill(".quill-editor-full", {
      modules: {
        toolbar: [
          [{
            font: []
          }, {
            size: []
          }],
          ["bold", "italic", "underline", "strike"],
          [{
              color: []
            },
            {
              background: []
            }
          ],
          [{
              script: "super"
            },
            {
              script: "sub"
            }
          ],
          [{
              list: "ordered"
            },
            {
              list: "bullet"
            },
            {
              indent: "-1"
            },
            {
              indent: "+1"
            }
          ],
          ["direction", {
            align: []
          }],
          ["link", "image", "video"],
          ["clean"]
        ]
      },
      theme: "snow"
    });
  }

  /**
   * Initiate TinyMCE Editor
   */
  const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
  const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

  tinymce.init({
    selector: 'textarea.tinymce-editor',
    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
    editimage_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    toolbar_sticky_offset: isSmallScreen ? 102 : 108,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [{
        title: 'My page 1',
        value: 'https://www.tiny.cloud'
      },
      {
        title: 'My page 2',
        value: 'http://www.moxiecode.com'
      }
    ],
    image_list: [{
        title: 'My page 1',
        value: 'https://www.tiny.cloud'
      },
      {
        title: 'My page 2',
        value: 'http://www.moxiecode.com'
      }
    ],
    image_class_list: [{
        title: 'None',
        value: ''
      },
      {
        title: 'Some class',
        value: 'class-name'
      }
    ],
    importcss_append: true,
    file_picker_callback: (callback, value, meta) => {
      /* Provide file and text for the link dialog */
      if (meta.filetype === 'file') {
        callback('https://www.google.com/logos/google.jpg', {
          text: 'My text'
        });
      }

      /* Provide image and alt text for the image dialog */
      if (meta.filetype === 'image') {
        callback('https://www.google.com/logos/google.jpg', {
          alt: 'My alt text'
        });
      }

      /* Provide alternative source and posted for the media dialog */
      if (meta.filetype === 'media') {
        callback('movie.mp4', {
          source2: 'alt.ogg',
          poster: 'https://www.google.com/logos/google.jpg'
        });
      }
    },
    templates: [{
        title: 'New Table',
        description: 'creates a new table',
        content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
      },
      {
        title: 'Starting my story',
        description: 'A cure for writers block',
        content: 'Once upon a time...'
      },
      {
        title: 'New list with dates',
        description: 'New List with dates',
        content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
      }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image table',
    skin: useDarkMode ? 'oxide-dark' : 'oxide',
    content_css: useDarkMode ? 'dark' : 'default',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
  });

  /**
   * Initiate Bootstrap validation check
   */
  var needsValidation = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(needsValidation)
    .forEach(function(form) {
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })

  /**
   * Initiate Datatables
   */
  const datatables = select('.datatable', true)
  datatables.forEach(datatable => {
    new simpleDatatables.DataTable(datatable);
  })

  /**
   * Autoresize echart charts
   */
  const mainContainer = select('#main');
  if (mainContainer) {
    setTimeout(() => {
      new ResizeObserver(function() {
        select('.echart', true).forEach(getEchart => {
          echarts.getInstanceByDom(getEchart).resize();
        })
      }).observe(mainContainer);
    }, 200);
  }

})();



// // function is implement for validation timer
// const error = document.className("timererror");
// setTimeout(() => {
//     error.style.display = "none"
// }, 4000);
// -----------------------Start-------------------------------
// this code is for direct po  and quotation required check at a time both should not be check at a time.
// Get references to the checkboxes
const quotationCheckbox = document.getElementById('quotation_required');
const directPOCheckbox = document.getElementById('direct_po_creation');
const directpurchasebox = document.getElementById('direct_purchase_required');

// Add event listeners to each checkbox
quotationCheckbox.addEventListener('change', function() {
    if (this.checked) {
        // If the quotation checkbox is checked, uncheck the direct PO checkbox
        directPOCheckbox.checked = false;
        directpurchasebox.checked = false
    }
});

directPOCheckbox.addEventListener('change', function() {
    if (this.checked) {
        // If the direct PO checkbox is checked, uncheck the quotation checkbox
        quotationCheckbox.checked = false;
        directpurchasebox.checked = false;
    }
});

directpurchasebox.addEventListener('change', function() {
    if (this.checked) {
        quotationCheckbox.checked = false;
        directPOCheckbox.checked = false;
    }
})

// -----------------------End-------------------------------
var gettvalueok = 0;
var totalproduct = document.getElementById("noproduct");
var totalproductInput = document.getElementById("totalnoproductInput");
var qtyproduct = document.getElementById("qtyproduct");
document.getElementById("qtyproductvalue").addEventListener("input", function() {
    var valuegetting = document.getElementById('qtyproductvalue').value;
    gettvalueok = parseInt(valuegetting);
});
var selectproduct = "";
var counter = 0;


function addRow() {
    var table = document.getElementById("tableBodydata");
    var newRow = table.insertRow(table.rows.length);
    counter = table.rows.length;
    totalproduct.innerHTML = counter;
    totalproductInput.value = counter;
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);
    var cell6 = newRow.insertCell(5);
    var cell7 = newRow.insertCell(6);
    var cell8 = newRow.insertCell(7);
    var cell9 = newRow.insertCell(8);
    var cell10 = newRow.insertCell(9);
    var cell11 = newRow.insertCell(10);
    var cell12 = newRow.insertCell(11);
    var cell13 = newRow.insertCell(12);
    var cell14 = newRow.insertCell(13);
    var cell15 = newRow.insertCell(14);
    var cell16 = newRow.insertCell(15);
    var cell17 = newRow.insertCell(16);
    var cell18 = newRow.insertCell(17);

    var namesInput = document.createElement("input");
    namesInput.type = "hidden";
    namesInput.name = "names[]";
    namesInput.value = counter;
    cell14.appendChild(namesInput);
    // start Category
    // create element select product category 
    var selectElement = document.createElement("select");
    selectElement.id = "pcategory" + counter;
    selectElement.className = "form-control";
    selectElement.name = "account[]";
    console.log(selectElement);
    // Add a default option Element of Category
    var defaultOption = document.createElement("option");
    defaultOption.text = "Select";
    selectElement.add(defaultOption);
    // Add options from PHP array for category
    //here fetching all records
    for (var i = 0; i < pcategoryData.length; i++) {
        var category = pcategoryData[i];
        var option = document.createElement("option");
        option.value = category.id;
        option.text = "id| " + category.id + " | Product Category | " + category.product_category;
        selectElement.add(option);
    }
    // End
    // start Sub Category
    // create element select sub category category
    var subcategory = document.createElement("select");
    subcategory.id = "subcategory" + counter;
    subcategory.className = "form-control";
    subcategory.name = "subcategory[]";
    // Add a default option Element of Category
    var defaultOption = document.createElement("option");
    defaultOption.text = "Select";
    subcategory.add(defaultOption);
    // Add options from PHP array for category

    // End
    // Start Product
    // create element select Product
    var selectproduct = document.createElement("select");
    selectproduct.id = "product" + counter;
    selectproduct.className = "form-control";
    selectproduct.name = "product[]";
    var productname = selectproduct.name;
    // Select option Element of product
    var defaultOption1 = document.createElement("option");
    defaultOption1.value = "product";
    defaultOption1.text = "Select";
    selectproduct.add(defaultOption1);
    // Data fetch from product 

    // END
    // Start brand
    // create element select Brand
    var selectbrand = document.createElement("select");
    selectbrand.id = "brand" + counter;
    selectbrand.className = "form-control";
    selectbrand.name = "brand[]";
    var brandname = selectbrand.name;
    // Select option Element of brand
    var defaultOption1 = document.createElement("option");
    defaultOption1.value = "brand";
    defaultOption1.text = "Select";
    selectbrand.add(defaultOption1);
    // data fetch from json and print in drop down selection

    // END
    // Append the select element to the cell
    cell1.innerHTML = counter;
    // This cell2.appendChild is use for add option selected value in category
    cell2.appendChild(selectElement);
    cell3.appendChild(subcategory);
    cell4.appendChild(selectbrand);
    cell5.appendChild(selectproduct);
    cell6.innerHTML =
        '<input type="text" class="form-control debit" placeholder="Product description" name="p_description[]' +
        table.rows
        .length + '">';
    cell7.innerHTML = '<input type="text" class="form-control debit" placeholder="UOM" name="UOM[]' + table.rows
        .length + '">';
    cell7.appendChild(namesInput);
    cell8.innerHTML =
        '---';
    var input = document.createElement("input");
    input.type = "text";
    input.className = "form-control debit";
    input.placeholder = "Quality Required";
    input.name = "qty_required[]" + counter;
    input.addEventListener("input", function() {
        // Update total quantity
        updateTotalQuantity();
    });
    cell9.appendChild(input);
    // Update total quantity initially
    cell9.appendChild(input);
    cell10.innerHTML =
        '<input type="number" class="form-control debit" placeholder="last Purchase" name="last_purchase' + table
        .rows.length + '">';
    cell11.innerHTML = '<span>---</span>';
    cell12.innerHTML = '<span>---</span>';
    cell13.innerHTML =
        '<input type="number" class="form-control credit" placeholder="0.00" name="minstock[]" id="minstock' + table
        .rows.length + '">';
    cell13.appendChild(namesInput);
    cell14.innerHTML =
        '<input type="number" class="form-control credit" placeholder="0.00" name="maxstock[]"id="maxstock' + table
        .rows.length + '">';
    cell14.appendChild(namesInput);
    cell15.innerHTML = ' <button type="button" class="btn btn-primary" onclick="addRow()">+</button>';
    cell16.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow()">-</button>';
    cell17.innerHTML =
        '<button type="button" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></button>';
    cell18.innerHTML = '<button type="button" class="btn  btn-warning" >.</button>';
    bindProductChangeEvent(counter);
    bindProductChangeCategoryEvent(counter);
    updateTotalQuantity();
    // declare for dynamic addrow dropdown selection of product category -> sub category 
    bindProductChangeCategoryEvent(counter);
    // declare for dynamic addrow dropdown selection of product sub category -> Brand Selection 
    bindsubcategoryChangebrandselectionEvent(counter);
    // declare for dynamic addrow dropdown selection of brand selction -> product 
    bindbrandChangeproductEvent(counter);
}
// function declare for update to Quality product
function updateTotalQuantity() {
    var totalQuantity = gettvalueok;
    var table = document.getElementById("tableBodydata");
    // Iterate through rows to sum up quantity values
    for (var i = 1; i < table.rows.length; i++) {
        var inputValue = parseInt(table.rows[i].cells[8].querySelector("input").value);
        if (!isNaN(inputValue)) {
            totalQuantity += inputValue;
        }
    }
    // Update total quantity display
    qtyproduct.innerHTML = totalQuantity;

    // Update hidden input field value
    document.getElementById("qtyproductInput").value = totalQuantity;
}
// this function is declare for erase rows from bottom to top
function removeRow() {
    var totalproductInput = document.getElementById("totalnoproductInput");
    var table = document.getElementById("tableBodydata");
    var totalproduct = document.getElementById("noproduct");
    totalproduct.innerHTML = table.rows.length - 1;
    totalproductInput.value = table.rows.length - 1;
    totalQuantity = gettvalueok;
    // Iterate through rows to sum up quantity values
    for (var i = 1; i < table.rows.length - 1; i++) {
        var inputValue = parseInt(table.rows[i].cells[8].querySelector("input").value);
        if (!isNaN(inputValue)) {
            console.log(i);
            totalQuantity = totalQuantity + inputValue;
        }
    }
    document.getElementById("qtyproductInput").value = totalQuantity;
    // Update total quantity display
    qtyproduct.innerHTML = totalQuantity;
    var table = document.getElementById("tableBodydata");
    if (table.rows.length > 1) {
        table.deleteRow(table.rows.length - 1)
    } else {
        alert("No Rows to Remove");
    }
}
// end here

$.noConflict();
jQuery(document).ready(function($) {
    jQuery('#productdata').change(function() {
        var productId = $(this).val();
        // Make an AJAX request to get UOM data
        $.ajax({
            url: '/get-uom/' + productId,
            type: 'GET',
            success: function(data) {
                var uomInput = $('input[name="UOM"]');
                uomInput.val(data.uom);

                var minstock = $('input[id="minstock"]');
                minstock.val(data.minqty);

                var maxstock = $('input[id="maxstock"]');
                maxstock.val(data.maxqty);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    $('#category').change(function() {
        var prodcategy_id = $(this).val();
        console.log(prodcategy_id);
        // Make an AJAX request to get UOM data
        $.ajax({
            url: '/get-category/' + prodcategy_id,
            type: 'GET',
            success: function(data) {
                var firstcategory = $('input[name="firstcategory"]');
                firstcategory.val(data.firstcategory);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    // this ajax is use for when use click on option of product category related to id filter data in get brand select by Abrar
    // Function to populate Sub Category dropdown based on Product Category selection
    // counter
    $('#pc_data').change(function() {
        var pc_id = $(this).val();
        $.ajax({
            url: '/getsubcategory/' + pc_id,
            type: 'GET',
            success: function(response) {
                $('#subcategory').empty();
                $('#subcategory').append(
                    '<option value="None" id="chnagefont">Select</option>');
                $.each(response, function(index, psubc) {
                    $('#subcategory').append('<option value="' + psubc.id +
                        '">id| ' + psubc.id + ' | Sub Category | ' + psubc
                        .product1stsbctgry + '</option>');
                });
            }
        });
    });

    // Function to populate Brand Selection dropdown based on Sub Category selection
    $('#subcategory').change(function() {
        var psubc_id = $(this).val();
        $.ajax({
            url: '/getbrand/' + psubc_id,
            type: 'GET',
            success: function(response) {
                $('#brandselection').empty();
                $('#brandselection').append(
                    '<option value="brand" id="chnagefont">Select</option>');
                $.each(response, function(index, brand) {
                    $('#brandselection').append(
                        '<option id="chnagefont" value="' + brand.id +
                        '">id | ' + brand.id + ' | Brand Selection | ' +
                        brand.brand_selection + '</option>');
                });
            }
        });
    });
    // Function to populate Product dropdown based on Brand Selection
    $('#brandselection').change(function() {
        var p_id = $(this).val();
        $.ajax({
            url: '/getproductdata/' + p_id,
            type: 'GET',
            success: function(response) {
                $('#productdata').empty();
                $('#productdata').append(
                    '<option value="product" id="">Select</option>'
                )
                $.each(response, function(index, product) {
                    $('#productdata').append(
                        '<option id="chnagefont" value="' + product.id +
                        '">id | ' + product.id + ' | Brand Selection | ' +
                        product.name + '</option>'
                    )
                })
            }
        })
    })

});
// this function declare in addRow this is for dynamic when user click dropdown on product category base selection option dropdown show option dropdown in sub category
function bindProductChangeCategoryEvent(counter) {
    jQuery('#pcategory' + counter).change(function() {
        var pc_id = $(this).val();
        $.ajax({
            url: '/getsubcategory/' + pc_id,
            type: 'GET',
            success: function(response) {
                $('#subcategory' + counter).empty();
                $('#subcategory' + counter).append(
                    '<option value="None" id="chnagefont">Select</option>');
                $.each(response, function(index, psubc) {
                    $('#subcategory' + counter).append('<option value="' + psubc.id +
                        '">id| ' + psubc.id + ' | Sub Category | ' + psubc
                        .product1stsbctgry + '</option>');
                });
            }
        });
    });
}
// this function declare in addRow this is for dynamic when user click dropdown on product sub category base on brand selection option dropdown show option dropdown in brand selection
function bindsubcategoryChangebrandselectionEvent(counter) {
    jQuery('#subcategory' + counter).change(function() {
        var psubc_id = $(this).val();
        $.ajax({
            url: '/getbrand/' + psubc_id,
            type: 'GET',
            success: function(response) {
                $('#brand' + counter).empty();
                $('#brand' + counter).append(
                    '<option value="None" id="chnagefont">Select</option>');
                $.each(response, function(index, brand) {
                    $('#brand' + counter).append('<option id="chnagefont" value="' +
                        brand.id +
                        '">id | ' + brand.id + ' | Brand Selection | ' +
                        brand.brand_selection + '</option>');
                });
            }
        });
    });
}

// this function declare in addRow this is for dynamic when user click dropdown on brand selection base on brand selection option dropdown show option dropdown in product dropdown
function bindbrandChangeproductEvent(counter) {
    jQuery('#brand' + counter).change(function() {
        var p_id = $(this).val();
        $.ajax({
            url: '/getproductdata/' + p_id,
            type: 'GET',
            success: function(response) {
                $('#product' + counter).empty();
                $('#product' + counter).append(
                    '<option value="None" id="chnagefont">Select</option>');
                $.each(response, function(index, product) {
                    $('#product' + counter).append('<option id="chnagefont" value="' +
                        product.id +
                        '">id | ' + product.id + ' | Product Name | ' +
                        product.name + '</option>');
                });
            }
        });
    });
}

function bindProductChangeEvent(counter) {
    jQuery(document).ready(function($) {
        $(document).on('change', "#product" + counter, function() {
            var productId = $(this).val();
            console.log("skdf")
            $.ajax({
                url: '/get-uom/' + productId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var uomInput = $('input[name="UOM' + counter + '"]');
                    let minstock = $('input[id="minstock' + counter + '"]');
                    let maxstock = $('input[id="maxstock' + counter + '"]');
                    uomInput.val(data.uom);
                    minstock.val(data.minqty);
                    maxstock.val(data.maxqty);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
}

// function bindProductChangeCategoryEvent(counter) {
//     jQuery(document).ready(function($) {
//         $(document).on('change', "#pcategory" + counter, function() {
//             var prodcategy_id = $(this).val();
//             console.log("skdf")
//             $.ajax({
//                 url: '/get-category/' + prodcategy_id,
//                 type: 'GET',
//                 dataType: 'json',
//                 success: function(data) {
//                     var firstcategory = $('input[name="subcategory' + counter + '"]');
//                     firstcategory.val(data.firstcategory);
//                 },
//                 error: function(xhr, status, error) {
//                     console.error(error);
//                 }
//             });
//         });

//     });
// }

