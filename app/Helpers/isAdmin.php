<?php

namespace  App\Helpers;

class isAdmin
{

     public static   function admin()
        {
            return auth('admin')->user();
        }

}
