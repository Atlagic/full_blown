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
                  <th><a href=""><i class = "fa fa-pencil-square-o"></i></a>INSERT</th>
                  <th> UPDATE </th>
                  <th> DELETE </th>
                  <th>ALL<input type = "checkbox" name = "chbb" onclick="toggle(this)"/></th>
                  <td> ID </td>
                  <th> TITLE </th>
                  <th> PICTURE </th>
                </tr>
                <tr>
                  <td></td>
                  <td><a href=""><i class = "fa fa-external-link"></i></a></td>
                  <td><a href=""><i class = "fa fa-trash-o"></a></td>
                  <td><input type = "checkbox" name = "chb"/></td>
                  <td> 1 </td>
                  <td> weightlifting </td>
                  <td> SLIKA </td>
                </tr>
                <tr>
                  <td></td>
                  <td><a href=""><i class = "fa fa-external-link"></i></a></td>
                  <td><a href=""><i class = "fa fa-trash-o"></a></td>
                  <td><input type = "checkbox" name = "chb"/></td>
                  <td> 2 </td>
                  <td> cardio </td>
                  <td> SLIKA </td>
                </tr>
                <tr>
                  <td></td>
                  <td><a href=""><i class = "fa fa-external-link"></i></a></td>
                  <td><a href=""><i class = "fa fa-trash-o"></a></td>
                  <td><input type = "checkbox" name = "chb"/></td>
                  <td> 3 </td>
                  <td> personal </td>
                  <td> SLIKA </td>
                </tr>
             </table>
            </form>
        </div>
    </div>

