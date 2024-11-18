CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usercode VARCHAR(255) NOT NULL,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    emailverification VARCHAR(55) NOT NULL,
    marital VARCHAR(15) NOT NULL,
    passwd VARCHAR(300),
    birthday VARCHAR(55) NOT NULL,
    gender VARCHAR(25) NOT NULL,
    mycountry VARCHAR(255) NOT NULL,
    mystate VARCHAR(255) NOT NULL,
    mylocation VARCHAR(255) NOT NULL,
    reason TEXT,
    imageupload VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE chat_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usercode VARCHAR(255) NOT NULL,
    sender VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE specialists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usercode VARCHAR(255) NOT NULL,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    emailverification VARCHAR(55) NOT NULL,
    gender VARCHAR(15) NOT NULL,
    passwd VARCHAR(300),
    birthday VARCHAR(55) NOT NULL,
    phone VARCHAR(25) NOT NULL,
    mycountry VARCHAR(255) NOT NULL,
    mystate VARCHAR(255) NOT NULL,
    mylocation VARCHAR(255) NOT NULL,
    specialty VARCHAR(255) NOT NULL,
    about TEXT NOT NULL,
    imageupload VARCHAR(15),
    approvalstatus VARCHAR(15) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    categories VARCHAR(255),
    status ENUM('Published', 'Draft', 'Review') NOT NULL,
    image_url VARCHAR(255),
    article TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);








CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    requestid BIGINT NOT NULL,
    email VARCHAR (250) NOT NULL,
    transactiontype VARCHAR(95) NOT NULL,
    amount DECIMAL(30, 2) NOT NULL,
    commission DECIMAL(20, 2),
    admincommission DECIMAL(20, 2),
    statuss VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE airtime (
    id INT AUTO_INCREMENT PRIMARY KEY,
    requestid BIGINT NOT NULL,
    email VARCHAR (250) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    amount DECIMAL(30, 2) NOT NULL,
    network VARCHAR(20) NOT NULL,
    commission DECIMAL(20, 2),
    admincommission DECIMAL(20, 2),
    statuss VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE mydata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    requestid BIGINT NOT NULL,
    email VARCHAR (250) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    amount DECIMAL(30, 2) NOT NULL,
    network VARCHAR(20) NOT NULL,
    commission DECIMAL(20, 2),
    admincommission DECIMAL(20, 2),
    statuss VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE mydeals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    requestid BIGINT NOT NULL,
    email VARCHAR (250) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    amount DECIMAL(30, 2) NOT NULL,
    network VARCHAR(20) NOT NULL,
    commission DECIMAL(20, 2),
    admincommission DECIMAL(20, 2),
    statuss VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE wallet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member VARCHAR (250) NOT NULL,
    amount DECIMAL(30, 2) NOT NULL,
    commission DECIMAL(30, 2),
    referralcommission DECIMAL(30, 2),
    cashout DECIMAL(30, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE topups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    refid BIGINT NOT NULL,
    member VARCHAR (250) NOT NULL,
    amount DECIMAL(30, 2) NOT NULL,
    statuss VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE mybank (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member VARCHAR (250) NOT NULL,
    available_amount DECIMAL(30, 2) NOT NULL,
    total_deposit DECIMAL(30, 2),
    total_spent DECIMAL(30, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE mybankdeposits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transactionid BIGINT NOT NULL,
    member VARCHAR (250) NOT NULL,
    amount_to_pay DECIMAL(30, 2) NOT NULL,
    transactiontype VARCHAR (50),
    paymentstatus VARCHAR (50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE spendingmonitor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member VARCHAR (250) NOT NULL,
    cashback DECIMAL(30, 2),
    withdrawals DECIMAL(30, 2),
    airtime DECIMAL(30, 2),
    mydata DECIMAL(30, 2),
    electricity DECIMAL(30, 2),
    dstv DECIMAL(30, 2),
    cabletv DECIMAL(30, 2),
    others DECIMAL(30, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE dstv (
    id INT AUTO_INCREMENT PRIMARY KEY,
    requestid BIGINT NOT NULL,
    email VARCHAR (250) NOT NULL,
    smartcardno VARCHAR(25) NOT NULL,
    amount DECIMAL(30, 2) NOT NULL,
    packagename VARCHAR(200) NOT NULL,
    commission DECIMAL(20, 2),
    admincommission DECIMAL(20, 2),
    statuss VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE others (
    id INT AUTO_INCREMENT PRIMARY KEY,
    requestid BIGINT NOT NULL,
    email VARCHAR (250) NOT NULL,
    othertype VARCHAR(250) NOT NULL,
    amount DECIMAL(30, 2) NOT NULL,
    commission DECIMAL(20, 2),
    admincommission DECIMAL(20, 2),
    statuss VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE gotv (
    id INT AUTO_INCREMENT PRIMARY KEY,
    requestid BIGINT NOT NULL,
    email VARCHAR (250) NOT NULL,
    smartcardno VARCHAR(25) NOT NULL,
    amount DECIMAL(30, 2) NOT NULL,
    packagename VARCHAR(200) NOT NULL,
    commission DECIMAL(20, 2),
    admincommission DECIMAL(20, 2),
    statuss VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE electricity (
    id INT AUTO_INCREMENT PRIMARY KEY,
    requestid BIGINT NOT NULL,
    email VARCHAR (250) NOT NULL,
    meterno VARCHAR(25) NOT NULL,
    amount DECIMAL(30, 2) NOT NULL,
    disco VARCHAR(200) NOT NULL,
    token VARCHAR(50) NOT NULL,
    unit VARCHAR(20) NOT NULL,
    commission DECIMAL(20, 2),
    admincommission DECIMAL(20, 2),
    statuss VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `referallinkmessages` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `cmessage` text,
  `amessage` text,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `modified_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='record of referal link messages.'
AUTO_INCREMENT=1 ;

CREATE TABLE `referals` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `referer` varchar(250) NOT NULL,
  `referee` text,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='record of referal link messages.'
AUTO_INCREMENT=1 ;

CREATE TABLE `transfers` (
  id int(100) NOT NULL AUTO_INCREMENT,
  requestid BIGINT NOT NULL,
  looper varchar(250) NOT NULL,
  loopee varchar(250) NOT NULL,
  amount DECIMAL(30, 2) NOT NULL,
  admincommission DECIMAL(20, 2),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='record of loop transfers.'
AUTO_INCREMENT=1 ;

CREATE TABLE `notifications` (
  id int(100) NOT NULL AUTO_INCREMENT,
  notificationid BIGINT NOT NULL,
  member varchar(250) NOT NULL,
  notification_message TEXT NOT NULL,
  nstatus varchar(25) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='record of notifications.'
AUTO_INCREMENT=1 ;

CREATE TABLE `messages` (
  id int(100) NOT NULL AUTO_INCREMENT,
  dname varchar(450) NOT NULL,
  email varchar(250) NOT NULL,
  dmessage TEXT NOT NULL,
  company varchar(650) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='record of messages.'
AUTO_INCREMENT=1 ;

CREATE TABLE `enterprise` (
  id int(100) NOT NULL AUTO_INCREMENT,
  enterpriseid BIGINT NOT NULL,
  enterprisetype varchar(250),
  member varchar(450) NOT NULL,
  beneficiaryname varchar(250) NOT NULL,
  beneficiaryphone varchar(250) NOT NULL,
  beneficiarymeterno varchar(250),
  beneficiarynetwork varchar(250),
  beneficiarydisco varchar(250),
  beneficiaryplantype varchar(250),
  beneficiaryfrequency varchar(250) NOT NULL,
  beneficiarystartdate varchar(250) NOT NULL,
  beneficiaryenddate varchar(250),
  beneficiaryamount BIGINT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='record of enterprise subscriptions.'

CREATE TABLE enterpriseairtime (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enterpriseid BIGINT NOT NULL,
    member VARCHAR (250) NOT NULL,
    beneficiaryphone varchar(20) NOT NULL,
    amount VARCHAR(150) NOT NULL,    
    network VARCHAR(150) NOT NULL,    
    nextrecharge VARCHAR(150) NOT NULL,    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE enterprisedata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enterpriseid BIGINT NOT NULL,
    member VARCHAR (250) NOT NULL,
    beneficiaryphone varchar(20) NOT NULL,
    product_id VARCHAR(150) NOT NULL,    
    nextrecharge VARCHAR(150) NOT NULL,   
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE enterpriseelectricity (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enterpriseid BIGINT NOT NULL,
    member VARCHAR (250) NOT NULL,
    beneficiaryphone varchar(20) NOT NULL,
    beneficiaryemail VARCHAR(250) NOT NULL,    
    meternumber varchar(20) NOT NULL,
    plantype VARCHAR(50) NOT NULL,  
    amount varchar(20) NOT NULL,
    disco VARCHAR(50) NOT NULL,   
    nextrecharge VARCHAR(150) NOT NULL,   
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE virtualaccounts (   
    id INT AUTO_INCREMENT PRIMARY KEY,
    referralid BIGINT NOT NULL,
    email VARCHAR (250) NOT NULL,
    fname VARCHAR(250) NOT NULL,    
    lname VARCHAR(250) NOT NULL,    
    accountnumber varchar(20) NOT NULL,
    bankcode VARCHAR(250) NOT NULL,    
    bank varchar(200) NOT NULL,  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


