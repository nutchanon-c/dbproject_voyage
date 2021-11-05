<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
        body {
            font-family: 'Ramabhadra', sans-serif;
        }
</style>
</head>
<body>
    <div class="container">
        <div class="headbar">
                <a href="home.php"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>
                <span><button type="submit" id="signin_button" onClick='document.location.href="login.php"'>Sign in</button></span>      
        </div> 
    
       
    </div>
    <div class="searchbox-holder">
        <div class="searchthing">
            <span>
                <span id="containerforlabel">
                  <label for="country_select" id="country_label">country</label>
                  <select id="country_select" name="country">
                  <option selected disabled>Select Country</option>
                      <option>foo</option>
                      <option>bar</option>
                      <option>baz</option>                    
                  </select>
                </span>
                <span id="containerforlabel">
                <label for="city_select" id="city_label">city</label>
                <select id="city_select" name="city" aria-label="City">
                <option selected disabled>Select City</option>
                    <option>foo</option>
                    <option>bar</option>
                    <option>baz</option>                    
                </select>
                </span>
                <img src="./assets/search_icon.png" style="background-color: #459E8D; border-radius: 7px; padding: 1em; vertical-align:middle; width: 2em; height: 2em; cursor: pointer;">
            </form>  
        </div> 
    </div>
<div class="recommended-holder">
    <h3 style="font-size: 24px">Recommended Places</h3>

    <table id="recommended_places_table">
        <tr>
            <td>
                <img src="./assets/bkk.png">
            </td>
            <td>
                <img src="./assets/london.png">
            </td>
            <td>
                <img src="./assets/chicago.png">
            </td>
            <td>
                <img src="./assets/la.png">
            </td>
            <td>
                <img src="./assets/tokyo.png">
            </td>
            <td>
                <img src="./assets/osaka.png">
            </td>
        </tr>
        <tr id="recommended-places-names">
            <td>
                Bangkok, Thailand
            </td>
            <td>
                London, UK
            </td>
            <td>
                Chicago, USA
            </td>
            <td>
                Los Angeles, USA
            </td>
            <td>
                Tokyo, Japan
            </td>
            <td>
                Osaka, Japan
            </td>
        </tr>
    </table>

    <div class="placeholder">

    </div>
</div>
</body>

</html>