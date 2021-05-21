input = document.getElementById("search");


    /**
     * Tracks search input and displays autocompleted versions 
     * in divs underneathe the searchbar based on what is in the array
     * 
     * @param String inp 
     * @param array arr 
     * 
     * @return void
     */
    function autocomplete(inp, arr) {

        var currentFocus;

        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;

            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;

            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");

            this.parentNode.appendChild(a);

            for (i = 0; i < arr.length; i++) {

                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {

                    b = document.createElement("DIV");

                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);

                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";

                    b.addEventListener("click", function(e) {

                        inp.value = this.getElementsByTagName("input")[0].value;

                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });

        inp.addEventListener("keydown", function(e) {
            const x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow down key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow up key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the enter key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                } 
            }
        });

        /**
         * removes active from every element and adds class focused item 
         * 
         * @param array x 
         * @return void | false
         */
        function addActive(x) {
            
            if (!x) return false;
            
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);

            x[currentFocus].classList.add("autocomplete-active");
        }

        /**
         * a function to remove the "active" class from all autocomplete items:
         * @param array x - represents the active prediction
         * @return void
         */
        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        /**
         *  close all autocomplete lists in the document,
         *  except the one passed as an argument
         * 
         * @param String elmnt 
         * @return void
         */
        function closeAllLists(elmnt) {
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }

        document.addEventListener("click", function(event) {
            closeAllLists(event.target);
        });
    }