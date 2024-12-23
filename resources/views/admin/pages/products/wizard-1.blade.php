<script>
    "use strict";

    // Class definition
    var KTWizard1 = function () {
        // Base elements
        var _wizardEl;
        var _formEl;
        var _wizardObj;
        var _validations = [];

        // Private functions
        var _initValidation = function () {
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            // Step 1
            _validations.push(FormValidation.formValidation(
                _formEl,
                {
                    fields: {       
                        'en[name]': {
                            validators: {
                                notEmpty: {
                                    message: '{{ t("English Name is required") }}'
                                }
                            }
                        },
                        'ar[name]': {
                            validators: {
                                notEmpty: {
                                    message: '{{t("Arabic Name is required")}}'
                                }
                            }
                        },
                        // 'en[description]': {
                        //  validators: {
                        //      notEmpty: {
                        //          message: 'Description is required'
                        //      }
                        //  }
                        // },
                        'price': {
                            validators: {
                                notEmpty: {
                                    message: '{{t("Price is required")}}'
                                },
                                 greaterThan: {
                                     message: '{{t("This Field must be bigger than zero")}}',
                                     min: 1,
                                 }
                            }
                        },
                        
                       
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        // Bootstrap Framework Integration
                        bootstrap: new FormValidation.plugins.Bootstrap({
                            //eleInvalidClass: '',
                            eleValidClass: '',
                        })
                    }
                }
            ));

            // Step 2
            _validations.push(FormValidation.formValidation(
                _formEl,
                {
                    fields: {
                        category_id: {
                            validators: {
                                notEmpty: {
                                    message: '{{t("Category is required")}}'
                                }
                            }
                        },
                        company_id: {
                            validators: {
                                notEmpty: {
                                    message: '{{t("Company is required")}}'
                                }
                            }
                        },
                        stock: {
                            validators: {
                                greaterThan: {
                                    message: '{{t("This Field must be bigger than zero")}}',
                                    min: 1,
                                }
                            }
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        // Bootstrap Framework Integration
                        bootstrap: new FormValidation.plugins.Bootstrap({
                            //eleInvalidClass: '',
                            eleValidClass: '',
                        })
                    }
                }
            ));

            // Step 3
            _validations.push(FormValidation.formValidation(
                _formEl,
                {
                    fields: {
                        // sizePrice: {
                        //  selector: '[data-validate="price"]',
                        //  validators: {
                        //      notEmpty: {
                        //          message: 'السعر مطلوب'
                        //      }
                        //  }
                        // },
                        // sizeQuantity: {
                        //  selector: '[data-validate="quantity"]',
                        //  validators: {
                        //      greaterThan: {
                        //          message: 'يجب ان تكون الكمية أكبر من صفر',
                        //          min: 1,
                        //      }
                        //  }
                        // },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        // Bootstrap Framework Integration
                        bootstrap: new FormValidation.plugins.Bootstrap({
                            //eleInvalidClass: '',
                            eleValidClass: '',
                        })
                    }
                }
            ));

            // Step 4
            _validations.push(FormValidation.formValidation(
                _formEl,
                {
                    fields: {
                        // locaddress1: {
                        //  validators: {
                        //      notEmpty: {
                        //          message: 'Address is required'
                        //      }
                        //  }
                        // },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        // Bootstrap Framework Integration
                        bootstrap: new FormValidation.plugins.Bootstrap({
                            //eleInvalidClass: '',
                            eleValidClass: '',
                        })
                    }
                }
            ));     

            // Step 5
            _validations.push(FormValidation.formValidation(
                _formEl,
                {
                    fields: {
                        // locaddress1: {
                        //  validators: {
                        //      notEmpty: {
                        //          message: 'Address is required'
                        //      }
                        //  }
                        // },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        // Bootstrap Framework Integration
                        bootstrap: new FormValidation.plugins.Bootstrap({
                            //eleInvalidClass: '',
                            eleValidClass: '',
                        })
                    }
                }
            ));
        }

        var _initWizard = function () {
            // Initialize form wizard
            _wizardObj = new KTWizard(_wizardEl, {
                startStep: 1, // initial active step number
                clickableSteps: false  // allow step clicking
            });

            // Validation before going to next page
            _wizardObj.on('change', function (wizard) {
                if (wizard.getStep() > wizard.getNewStep()) {
                    if(wizard.getStep() == 2){
                        $('.btn-secondary').css('display', 'block');
                    }
                    return; // Skip if stepped back
                }

                // Validate form before change wizard step
                var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

                if (validator) {
                    validator.validate().then(function (status) {
                        if (status == 'Valid') {
                            wizard.goTo(wizard.getNewStep());
                            // KTUtil.scrollTop();
                            console.log(wizard.getStep());
                            if(wizard.getStep() >= 2){
                                $('.btn-secondary').css('display', 'none');
                            }
                        } else {
                            Swal.fire({
                                text: "{{t('Please Insert All required fields')}}",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "{{t('OK')}}",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light"
                                }
                            }).then(function () {
                                // KTUtil.scrollTop();
                            });
                        }
                    });
                }

                return false;  // Do not change wizard step, further action will be handled by he validator
            });

            // Change event
            _wizardObj.on('changed', function (wizard) {
                // KTUtil.scrollTop();
            });

            // Submit event
            _wizardObj.on('submit', function (wizard) {
                Swal.fire({
                    text: "{{t('Submit')}}",
                    icon: "success",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "{{t('Yes')}}",
                    cancelButtonText: "{{t('No')}}",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-primary",
                        cancelButton: "btn font-weight-bold btn-default"
                    }
                }).then(function (result) {
                    if (result.value) {
                        _formEl.submit(); // Submit form
                    } else if (result.dismiss === 'cancel') {
                        // Swal.fire({
                        //  text: "Your form has not been submitted!.",
                        //  icon: "error",
                        //  buttonsStyling: false,
                        //  confirmButtonText: "Ok, got it!",
                        //  customClass: {
                        //      confirmButton: "btn font-weight-bold btn-primary",
                        //  }
                        // });
                    }
                });
            });
        }

        return {
            // public functions
            init: function () {
                _wizardEl = KTUtil.getById('kt_wizard');
                _formEl = KTUtil.getById('kt_form');

                _initValidation();
                _initWizard();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTWizard1.init();
    });

</script>