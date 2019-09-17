# EC_Claim (EC Claim)

-
EC_Cleam is the subsystem which is developed for your own online profile which can share easily by your own format. In the evaluation of the system that has been trying to deliver the best application within the limitation of time but there was still possible to implement new features and functionality for the best attractive product. Therefore, the project live demo, repository, and screencast video are following below:

**Version**: 1.0 Release of the EC_Cleam (Online Profile).

- Application Live: https://live-ec-claim.herokuapp.com/
- Screencast video for live demo presentation without audio:
  <!-- <a href="https://www.useloom.com/share/5e7a93bd7aa64fc7b55a33b70b19a0e8"><img src="screencast_video.jpg" border="10" alt="SEV_System_Live_Demo" width="560" height="315" /></a> -->

---

## Table of Contents

- [Overview](#overview)
- [Problem Domain Area](#problem-Domain-Area)
- [The Advantages of System](#The-Advantages-of-System)
- [The Limitations of System](#The-Limitations-of-System)
- [The System Features List](#system-features-list)
- [Entity Relationship Diagram (ERD)](#Entity-Relationship-Diagram)
- [Technologies and Libraries](#technologies-and-libraries)
- [Further Development](#further-development)
- [How to run the System](#how-to-run-the-system)
- [Questions and Answers](#questions-and-answers)
- [Summary](#summary)
- [References](#references)

---

## Overview

This is identified that the project developed as calling name EC_Cleam. The system handles to share your own profile by your own custom format which can share your CV. Therefore, the system is completely run error-free in that checking period.

## Problem Domain Area

- To Share online profile with github link.

## The Advantages of System

- The application is fully responsive.
- Authenticated by the security route such as web, active and current users based.
- validation and verification with relevant error and success message.
- Highly Modern EDGE Technology Used.
- Custom error messaging with custom error pages.

## The Limitations of System

- The system is not used highly graphics and best UX design.
- Any information can't modify within the single click.
- Users can't find their following twitch name in real time just like Twitch.
- The system didn't config any mailing system for notifications.

## The System Features List

- login and Registration
- Effective Dashboard
- Post For Share
- Make Online Profile

## Entity-Relationship-Diagram

<!-- ![arc](erd_diagram.jpg?raw=true 'ERD_Diagram') -->

## Technologies and libraries

- VSCode Editor
- ES6+ Syntax
- Async /Await
- React Hooks
- Redux With DevTools
- Json Web Tokens (JWT)
- Postman HTTP Client
- Mongoose / MongoDB / Atlas
- Bcrypt Password Hashing
- Heroku & Git Depeloyment
- Node v10.16.3, NPM v6.9.0.

## Further Development

- Highly UX design with graphical and visual chart reports.
- Personal email processing within the mail notification system.
- Refresh the authentication token when it will be expired.
- Refactoring coding standard with live data loaded.
- Testing plan implements with PHPUnit tools.

## How to run the System

### Run on the development environment

- Open terminal window with your dev area
- Then run this below comments

```sh
$ git clone https://github.com/vorsurm/EC_Cleam.git

# Install dependencies for server
npm install

# Install dependencies for client
npm run client-install

# Run the client & server with concurrently
npm run dev

# Run the Express server only
npm run server

# Run the React client only
npm run client

# Server runs on http://localhost:5000 and client on http://localhost:3000

```

### Configure environment variables

- Add the .env variable name of the following below information.

```

mongoDB Config:
==============
https://cloud.mongodb.com
- create a account
- config mongoDB

Connect to EC_Cleam:
====================
Node.js -> 3.0 or later
Copy -> Connection String Only


```

- Browser opens up and runs with URL: `http://localhost:5000`
- Login after Registration
- create your profile.
- post throught the browser.
- share the link .

---

## Questions and Answers

### How would you deploy the above on AWS? (ideally, a rough architecture diagram will help)

![arc](aws_deploy_diagram.jpg?raw=true 'Architecture')

### Where do you see bottlenecks in your proposed architecture and how would you approach scaling this app starting from 100 reqs/day to 900MM reqs/day over 6 months?

In this section, I am just trying to figure out from the AWS documentation and trying to follow the coding standard. Truly speaking that, I don't have any access AWS service but I used the s3 key, secret, region, bucket, and URL for image storage. Therefore, here is the suitable answers are following below.

**_AWS Service Purpose_**

- Used auto-scaling tools(configure: group name, min & max size, and availability zones)
- Around 19 Regions (Availability Zones, used advantage from AWS global infrastructure)
- Robust, used for fully featured technology infrastructure.
- Used AWS building blocks (lambda, CloudFront, Elastic etc.)

**_For Application Purpose_**

- Application load balancer(session, logging, routing, and health check)
- shift some load around (Used cache content)
- Managed NoSQL database for lace schema
- Service Oriented Architecture

**_Users >1 Millions_**

- Used Multi-AZ deployment
- Elastic Load Balancing between tires
- Used Auto Scaling tools
- Service Oriented Architecture (SOA)
- Serving Content Smartly(S3/ColudFront)
- Caching off DB (configurations)
- Moving state off tiers that auto scale

**_Users >10 Millions_**

- More fine-tuning of the full application
- More SOA of features/functionality
- Going from multi-Az to multi-region
- Possibly start to build custom solutions
- Deep analysis of the entire stack
- Build serverless whenever possible

## Summary

EC_Cleam is successfully developed and implemented also it's live now as a first version 1.0. After the hardworking and self-studying period, I would like to say, I learn very much from that project which was a totally new concept on the live streaming online channel with API integration. Therefore, It'a was very durable and helpful for me in every stage as a programmer, tester and the scrum master.

## References

- https://docs.aws.amazon.com/codedeploy/latest/userguide/welcome.html
- https://aws.amazon.com/blogs/startups/scaling-on-aws-part-3-500k-users
- https://laravel-json-api.readthedocs.io/en/latest/features/http-clients/
- https://socialiteproviders.netlify.com/providers/twitch.html
- https://www.quora.com/What-are-the-Laravel-best-practices
