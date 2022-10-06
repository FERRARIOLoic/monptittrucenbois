<?php

define('REGEX_NAME',"^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-_]+$/u^");
define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$^');
define('REGEX_TIME','^([0-9]{2}):([0-9]{2})$^');
define('REGEX_PHONE',"^[0-9]{10}$^");
define('REGEX_MAIL',"^(?=[A-Z0-9@._%+-]{6,254}$)[A-Z0-9._%+-]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,8}[A-Z]{2,63}$^");
define('REGEX_INT',"^[0-9]$^");
define('REGEXP_STR_NO_NUMBER','^[A-Za-zéèêëàâäôöûüç\' ]+$');

define('SECRET_KEY',"R/jWg/4>7DM3>7u&[w!?{=j6e7cJ(2pMN!3J3r68B6Fru9FhRy");