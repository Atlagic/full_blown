<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script type ="text/javascript">
       $(document).ready(function(){
         $("tbody tr:even").css('background-color', '#98FB98');
       });
     </script>
     <script type ="text/javascript" language="JavaScript">

       function toggle(source) {
         checkboxes = document.getElementsByName('chb');
         for(var i=0, n=checkboxes.length;i<n;i++)
         {
           checkboxes[i].checked = source.checked;
         }
       }

     </script>
<div id="content">
        <div id="admin_panel">
          <form method="POST" id="ap_form">
           <table>
                <tr>
                  <th> UPDATE </th>
                  <th> DELETE </th>
                  <th>ALL<input type = "checkbox" name = "chbb" onclick="toggle(this)"/></th>
                  <th> ID </th>
                  <th> TITLE </th>
                  <th> NAME </th>
                </tr>
                <tr>
                  <td></td>
                  <td><a href=""><i class = "fa fa-external-link"></i></a></td>
                  <td><a href=""><i class = "fa fa-trash-o"></a></td>
                  <td><input type = "checkbox" name = "chb"/></td>
                  <td> 1 </td>
                  <td> svasta </td>
                  <td> Svasta </td>
                </tr>
                <tr>
                  <td></td>
                  <td><a href=""><i class = "fa fa-external-link"></i></a></td>
                  <td><a href=""><i class = "fa fa-trash-o"></a></td>
                  <td><input type = "checkbox" name = "chb"/></td>
                  <td> 2 </td>
                  <td> nesto </td>
                  <td> Nesto </td>
                </tr>
                <tr>
                  <td></td>
                  <td><a href=""><i class = "fa fa-external-link"></i></a></td>
                  <td><a href=""><i class = "fa fa-trash-o"></a></td>
                  <td><input type = "checkbox" name = "chb"/></td>
                  <td> 3 </td>
                  <td> svasta </td>
                  <td> Svasta </td>
                </tr>
             </table>
            </form>
        </div>
    </div>

