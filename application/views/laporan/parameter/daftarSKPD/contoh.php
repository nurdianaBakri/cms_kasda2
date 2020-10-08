 
<!DOCTYPE html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
	<title></title>
</head>
<body>

	<a href="javascript:demoFromHTML()" class="button">Run Code</a>
	<div id="content"> 
	        <table>
			  <tr>
			    <th>Company</th>
			    <th>Contact</th>
			    <th>Country</th>
			  </tr>
			  <tr>
			    <td>Alfreds Futterkiste</td>
			    <td>Maria Anders</td>
			    <td>Germany</td>
			  </tr>
			  <tr>
			    <td>Centro comercial Moctezuma</td>
			    <td>Francisco Chang</td>
			    <td>Mexico</td>
			  </tr>
			  <tr>
			    <td>Ernst Handel</td>
			    <td>Roland Mendel</td>
			    <td>Austria</td>
			  </tr>
			  <tr>
			    <td>Island Trading</td>
			    <td>Helen Bennett</td>
			    <td>UK</td>
			  </tr>
			  <tr>
			    <td>Laughing Bacchus Winecellars</td>
			    <td>Yoshi Tannamuri</td>
			    <td>Canada</td>
			  </tr>
			  <tr>
			    <td>Magazzini Alimentari Riuniti</td>
			    <td>Giovanni Rovelli</td>
			    <td>Italy</td>
			  </tr>
			</table> 
	</div>

	<script> 
	    function demoFromHTML() {
	        var pdf = new jsPDF('p', 'pt', 'letter');
	        // source can be HTML-formatted string, or a reference
	        // to an actual DOM element from which the text will be scraped.
	        source = $('#content')[0];

	        // we support special element handlers. Register them with jQuery-style 
	        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
	        // There is no support for any other type of selectors 
	        // (class, of compound) at this time.
	        specialElementHandlers = {
	            // element with id of "bypass" - jQuery style selector
	            '#bypassme': function (element, renderer) {
	                // true = "handled elsewhere, bypass text extraction"
	                return true
	            }
	        };
	        margins = {
	            top: 80,
	            bottom: 60,
	            left: 40,
	            width: 522
	        };
	        // all coords and widths are in jsPDF instance's declared units
	        // 'inches' in this case
	        pdf.fromHTML(
	            source, // HTML string or DOM elem ref.
	            margins.left, // x coord
	            margins.top, { // y coord
	                'width': margins.width, // max width of content on PDF
	                'elementHandlers': specialElementHandlers
	            },

	            function (dispose) {  
	                // dispose: object with X, Y of the last line add to the PDF 
	                //          this allow the insertion of new lines after html
	                // pdf.save('Test.pdf');
	                window.open(pdf.save('Test.pdf'), '_blank'); 
	            }, margins
	        );
	    }
	</script>


</body>
</html>



	