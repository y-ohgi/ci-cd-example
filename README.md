ci-cd-example
---

# About
LaravelとAWSによるCI/CDのサンプル

# Usage
## Run local
```
$ docker-compose run web composer local-init
$ docker-compose up
```
[http://localhost:8080](http://localhost:8080)

# Deploy AWS environment
## Components
* VPC
    - Subnet
    - Nat Gateway
    - VPC FlowLog
    - SecurityGroup
* Aurora
    - MySQL Compatible
* ALB
* ECS Cluster

## Run
```
$ aws cloudformation deploy \
    --stack-name ci-cd-example \
    --template-file ./scripts/cloudformation.yaml \
    --capabilities CAPABILITY_NAMED_IAM
```

