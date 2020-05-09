@extends('client.master')

@section('home-content')

    <div class="container shadow cart">

        <div class="container-fluid cart-step mb-4">
            <h1 class="text-center mt-4 mb-4"> Checkout Here</h1>
            <div class="multisteps-form">
                <!--progress bar-->
                <div class="row">
                    <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">User
                                Info
                            </button>
                            <button class="multisteps-form__progress-btn" type="button" title="Address">Address</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Order Info">Order Info
                            </button>
                            <button class="multisteps-form__progress-btn" type="button" title="Comments">Comments
                            </button>
                        </div>
                    </div>
                </div>
                <!--form panels-->
                <div class="row">
                    <div class="col-12 m-auto">
                        <div class="multisteps-form__form">
                            <!--single form panel - cart panel-->

                            <div class="multisteps-form__panel p-4 rounded bg-white js-active"
                                 data-animation="scaleIn">
                                <h3 class="text-center mb-2">GADGETOY CART</h3>
                                <!--<p class="text-center lead mb-4">Search Through 1000+ Gadgets, Book Your Desired Product. Get Delivered. </p>-->

                                <table id="cart" class="table table-hover table-condensed mt-4 mb-4">
                                    <thead>
                                    <tr>
                                        <th style="width:40%">Product</th>
                                        <th style="width:15%">Price</th>
                                        <th style="width:18%">Quantity</th>
                                        <th style="width:22%" class="text-center">Unit * Quantity</th>
                                        <th style="width:5%"></th>
                                    </tr>
                                    </thead>
                                    @foreach ($cartItems as $cartItem)
                                        <tbody>
                                        <tr>
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-2 hidden-xs"><img
                                                            src="{{asset($cartItem->options->image)}}" alt=""
                                                            class="img-responsive"/></div>
                                                    <div class="col-sm-10">
                                                        <h4 class="nomargin">{{$cartItem->name}}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">৳ {{$cartItem->price}}</td>
                                            <td data-th="Quantity">
                                                <form action="{{route('update-cart')}}" method="post">
                                                    @csrf
                                                    <input type="number" min="1" name="qty"
                                                           class="col-md-5 text-center" value="{{$cartItem->qty}}">
                                                    <input type="hidden" name="rowId" value="{{$cartItem->rowId}}">
                                                    <button><i class="fa fa-refresh ml-2"></i></button>
                                                </form>
                                            </td>
                                            <td data-th="Subtotal"
                                                class="text-center">৳ {{$total = $cartItem->price * $cartItem->qty }}

                                            </td>

                                            <td class="actions" data-th="">
                                                <a href="{{route('delete-cart-item',['id'=>$cartItem->rowId])}}"><i
                                                        class="fa fa-trash ml-3"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach


                                    <tfoot>
                                    {{--<tr class="visible-xs">
                                        <!--<td class="text-center"><strong>Total 50,000.00 BDT</strong></td>-->
                                    </tr>--}}
                                    <tr>
                                        {{--<td><a href="shop.html" class="btn btn-warning text-white"><i
                                                    class="fa fa-angle-left"></i> Continue Shopping</a></td>--}}
                                        <td colspan="2" class="hidden-xs"></td>

                                        <th class="hidden-xs">Sub Total:</th>
                                        <th class="hidden-xs text-center">Vat(10%):</th>
                                        <th class="hidden-xs ">Total:</th>


                                        <!--<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>-->
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('/')}}" class="btn btn-warning text-white"><i
                                                    class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                        <td colspan="1" class="hidden-xs"></td>
                                        <td class="hidden-xs"><strong>{{$subTotal = Cart::subTotal()}}</strong>

                                        </td>
                                        <td class="hidden-xs text-center"><strong>{{$vat = Cart::tax()}}</strong>
                                        </td>
                                        <td class="hidden-xs "><strong>{{$totalCost=Cart::total()}}</strong>
                                        <?php
                                        Session::put('subTotal', $subTotal);
                                        Session::put('vat', $vat);
                                        Session::put('totalCost', $totalCost);


                                        ?>
                                    </tr>


                                    </tfoot>
                                </table>

                                <div class="button-row d-flex mt-4">
                                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">
                                        Next
                                    </button>
                                </div>
                            </div>

                            <!--cart panel ends-->


                            <!--single form panel shipping details panel-->
                            <form action="{{route('confirm-order')}}" method="post">
                                @csrf
                                <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title text-center">Shipping Details</h3>
                                    <div class="multisteps-form__content">


                                        <div class="form-row mt-3">
                                            <div class="col">
                                                <input class="multisteps-form__input form-control" type="text"
                                                       placeholder="Full Address" name="fullAddress"/>
                                            </div>
                                        </div>

                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-6">
                                                <input class="multisteps-form__input form-control" type="text"
                                                       placeholder="City" name="city"/>
                                            </div>
                                            <div class="col-12 col-sm-6 ">
                                                <select name="district" class="multisteps-form__select form-control">
                                                    <option selected="selected">District</option>
                                                    <option value="Dhaka">Dhaka</option>
                                                    <option value="Chattogram">Chattogram</option>
                                                    <option value="Rajshahi">Rajshahi</option>
                                                    <option value="Khulna">Khulna</option>
                                                    <option value="Barisal">Barisal</option>
                                                    <option value="Sylhet">Sylhet</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">
                                                Prev
                                            </button>
                                            <button class="btn btn-primary ml-auto js-btn-next" type="button"
                                                    title="Next">Next
                                            </button>
                                        </div>

                                        <!--<div class="form-check mt-4">-->
                                        <!--	<input type="checkbox" class="form-check-input" id="shipping-adress"> -->
                                        <!--		Shipping address is the same as my billing address-->
                                        <!--	<label for="shipping-adress" class="form-check-label"></label>-->
                                        <!--</div>-->

                                        <div class="form-check mt-4">
                                            <input type="checkbox" class="form-check-input" id="same-adress">
                                            Save this information for next time
                                            <label for="same-adress" class="form-check-label"></label>
                                        </div>

                                    </div>
                                </div>
                                <!--shipping details panel ends-->


                                <!--single form panel payment method panel-->
                                <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title text-center">Payment Method</h3>
                                    <div class="multisteps-form__content">
                                        <div class="row">
                                            <div class="col-12 mt-4">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="credit"
                                                           name="paymentMethod" value="Credit Card" checked>
                                                    <label for="credit" class="form-check-label">Credit Card</label><br>
                                                    <input type="radio" value="Debit Card" class="form-check-input"
                                                           id="debit"
                                                           name="paymentMethod">
                                                    <label for="debit" class="form-check-label">Debit Card</label><br>
                                                    <input type="radio" value="PayPal" class="form-check-input"
                                                           id="paypal"
                                                           name="paymentMethod">
                                                    <label for="paypal" class="form-check-label">PayPal</label><br>
                                                    <input type="radio" value="Bkash" class="form-check-input"
                                                           id="bkash"
                                                           name="paymentMethod">
                                                    <label for="bkash" class="form-check-label">Bkash</label>
                                                </div>


                                                <div class="row mt-4">
                                                    <div class="col-md-6 form-group">
                                                        <label for="card-name">Name on card</label>
                                                        <input type="text" class="form-control" id="card-name"
                                                               name="nameOnCard"
                                                               placeholder>
                                                        <div class="invalid-feedback">
                                                            Name on card is required
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 form-group">
                                                        <label for="card-no">Card Number</label>
                                                        <input type="text" class="form-control" id="card-no"
                                                               name="cardNumber"
                                                               placeholder>
                                                        <div class="invalid-feedback">
                                                            Credit card number is required
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label for="expiration">Expire Date</label>
                                                        <input type="date" class="form-control" id="card-name"
                                                               name="expireDate" placeholder>
                                                        <div class="invalid-feedback">
                                                            Expiration date required
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 form-group">
                                                        <label for="ccv-no">Security Number</label>
                                                        <input type="text" class="form-control" id="sec-no"
                                                               name="securityNumber" placeholder>
                                                        <div class="invalid-feedback">
                                                            Security code required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button"
                                                        title="Prev">Prev
                                                </button>
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button"
                                                        title="Next">Next
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--payment method panel ends-->

                                <!--single form panel additional comments-->
                                <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="scaleIn">
                                    <h3 class="multisteps-form__title">Additional Comments</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                                <textarea name="comment" class="multisteps-form__textarea form-control"
                                                          placeholder="Additional Comments and Requirements"></textarea>
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">
                                                Prev
                                            </button>
                                            <input class="btn btn-success btn-robot ml-auto" type="submit" title="Send"
                                                   value="Checkout">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--additional comments panel ends-->

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--checkout stepper ends-->
    </div>
    </div>

    <script>

        //DOM elements
        const DOMstrings = {
            stepsBtnClass: 'multisteps-form__progress-btn',
            stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
            stepsBar: document.querySelector('.multisteps-form__progress'),
            stepsForm: document.querySelector('.multisteps-form__form'),
            stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
            stepFormPanelClass: 'multisteps-form__panel',
            stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
            stepPrevBtnClass: 'js-btn-prev',
            stepNextBtnClass: 'js-btn-next'
        };


        //remove class from a set of items
        const removeClasses = (elemSet, className) => {

            elemSet.forEach(elem => {

                elem.classList.remove(className);

            });

        };

        //return exect parent node of the element
        const findParent = (elem, parentClass) => {

            let currentNode = elem;

            while (!currentNode.classList.contains(parentClass)) {
                currentNode = currentNode.parentNode;
            }

            return currentNode;

        };

        //get active button step number
        const getActiveStep = elem => {
            return Array.from(DOMstrings.stepsBtns).indexOf(elem);
        };

        //set all steps before clicked (and clicked too) to active
        const setActiveStep = activeStepNum => {

            //remove active state from all the state
            removeClasses(DOMstrings.stepsBtns, 'js-active');

            //set picked items to active
            DOMstrings.stepsBtns.forEach((elem, index) => {

                if (index <= activeStepNum) {
                    elem.classList.add('js-active');
                }

            });
        };

        //get active panel
        const getActivePanel = () => {

            let activePanel;

            DOMstrings.stepFormPanels.forEach(elem => {

                if (elem.classList.contains('js-active')) {

                    activePanel = elem;

                }

            });

            return activePanel;

        };

        //open active panel (and close unactive panels)
        const setActivePanel = activePanelNum => {

            //remove active class from all the panels
            removeClasses(DOMstrings.stepFormPanels, 'js-active');

            //show active panel
            DOMstrings.stepFormPanels.forEach((elem, index) => {
                if (index === activePanelNum) {

                    elem.classList.add('js-active');

                    setFormHeight(elem);

                }
            });

        };

        //set form height equal to current panel height
        const formHeight = activePanel => {

            const activePanelHeight = activePanel.offsetHeight;

            DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

        };

        const setFormHeight = () => {
            const activePanel = getActivePanel();

            formHeight(activePanel);
        };

        //STEPS BAR CLICK FUNCTION
        DOMstrings.stepsBar.addEventListener('click', e => {

            //check if click target is a step button
            const eventTarget = e.target;

            if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
                return;
            }

            //get active button step number
            const activeStep = getActiveStep(eventTarget);

            //set all steps before clicked (and clicked too) to active
            setActiveStep(activeStep);

            //open active panel
            setActivePanel(activeStep);
        });

        //PREV/NEXT BTNS CLICK
        DOMstrings.stepsForm.addEventListener('click', e => {

            const eventTarget = e.target;

            //check if we clicked on `PREV` or NEXT` buttons
            if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`))) {
                return;
            }

            //find active panel
            const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

            let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

            //set active step and active panel onclick
            if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
                activePanelNum--;

            } else {

                activePanelNum++;

            }

            setActiveStep(activePanelNum);
            setActivePanel(activePanelNum);

        });

        //SETTING PROPER FORM HEIGHT ONLOAD
        window.addEventListener('load', setFormHeight, false);

        //SETTING PROPER FORM HEIGHT ONRESIZE
        window.addEventListener('resize', setFormHeight, false);
    </script>

@endsection


