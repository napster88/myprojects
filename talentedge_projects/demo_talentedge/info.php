
<form name="elqform" action="https://s1827061339.t.eloqua.com/e/f2" >
                <input type="hidden" name="elqFormName" value="XLRI_TestForm">
                <input type="hidden" name="elqSiteID" value="1827061339">
               <input type="hidden" name="input_1" value="<?php echo $newData['name']['value'];?>">
               <input type="hidden" name="input_11" value="<?php echo $newData['email']['value'];?>">
               <input type="hidden" name="input_3" value="<?php echo ($newData['mobile_number']['value']) ? $newData['mobile_number']['value'] : $newData['phone']['value'];?>">
           <!-- <input type="submit" value="Submit">-->
          </form> 
          <script type="text/javascript">alert('11111111111111111');
          document.forms["elqform"].submit();alert('22222222222');
          </script>
 
