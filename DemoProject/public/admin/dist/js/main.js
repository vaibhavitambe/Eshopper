$().ready(function(){
   $("#userForm").validate({
      rules: {
         firstname: {
            required: true
               },
         lastname: {
            required: true
            },
         email: {
            required: true
            },
         password: {
            required: true,
            minlength: 5
            },
         conpass: {
            required: true
            }
         },
         messages: {
            firstname: {
               required: "Firstname is required"
            },
         
         lastname: {
            required: "Description is required"
            },

         email: {
            required: "Email is required"
            },

         password: {
            required: "Password is required",
            minlength: "Your password must be at least 5 characters long"
            },

         conpass: {
            required: "Confirm Password is required"
            }
         }
     });

   $("#bannerForm").validate({
      rules: {
         title: {
            required: true
               },
         description: {
            required: true
            }
         },
         messages: {
            title: {
               required: "Title is required"
            },
         
         description: {
            required: "Description is required"
            }
         }
     });

   $("#attributeForm").validate({
      rules: {
         attributename: {
            required: true
               }
         },
         messages: {
            attributename: "Attribute Name is required"
         }
     });

   $("#configForm").validate({
      rules: {
         confkey: {
            required: true
               },
         confvalue: {
            required: true
            }
         },
         messages: {
            confkey: {
               required: "Configuration Key is required"
            },
         
         confvalue: {
            required: "Configuration Value is required"
            }
         }
     });

   $("#categForm").validate({
      rules: {
         name: {
            required: true
               },
         url: {
            required: true
            }
         },
         messages: {
            name: {
               required: "Category Name is required"
            },
         
         confvalue: {
            url: "Category URL is required"
            }
         }
     });

   $("#productForm").validate({
      rules: {
         name: {
            required: true
               },
         sku: {
            required: true
            },
         shortdes: {
            required: true
            },
         longdes: {
            required: true
            },
         price: {
            required: true
            },
         specialpriceto: {
            required: true
            },
         quantity: {
            required: true
            },
         metatitle: {
            required: true
            },
         metades: {
            required: true
            },
         metakey: {
            required: true
            }
         },
         messages: {
            name: {
               required: "Product Name is required"
            },
         
         sku: {
            required: "Product SKU is required"
            },
         shortdes: {
            required: "Short Description is required"
            },
         longdes: {
            required: "Long Description is required"
            },
         price: {
            required: "Price is required"
            },
         specialpriceto: {
            required: "Special Price is required"
            },
         quantity: {
            required: "Quantity is required"
            },
         metatitle: {
            required: "Meta Title is required"
            },
         metades: {
            required: "Meta Description is required"
            },
         metakey: {
            required: "Meta Key is required"
            }
         }
     });

   $("#couponForm").validate({
      rules: {
         code: {
            required: true
               },
         percentoff: {
            required: true
            },
         nouses: {
            required: true
            }
         },
         messages: {
            code: {
               required: "Coupon Code is required"
            },
         
         percentoff: {
            required: "Percentoff is required"
            },

         nouses: {
            required: "No of Uses is required"
            }
         }
     });

   $("#cmsForm").validate({
      rules: {
         title: {
            required: true
               },
         content: {
            required: true
            },
         metatitle: {
            required: true
            },
         metades: {
            required: true
            },
         metakey: {
            required: true
            }
         },
         messages: {
            title: {
               required: "Title is required"
            },
         
         content: {
            required: "Content is required"
            },

         metatitle: {
            required: "Meta Title is required"
            },
         metades: {
            required: "Meta Description is required"
            },
         metakey: {
            required: "Meta Key is required"
            }
         }
     });
});
	