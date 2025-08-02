import * as cdk from 'aws-cdk-lib';
import {Construct} from 'constructs';
import {packagePhpCode, PhpFpmFunction} from '@bref.sh/constructs';
import * as lambda from 'aws-cdk-lib/aws-lambda';

export class BebouAppStack extends cdk.Stack {
    constructor(scope: Construct, id: string, props?: cdk.StackProps) {
        super(scope, id, props);

        const myFunction = new PhpFpmFunction(this, 'BebouAppFunction', {
            handler: 'public/index.php',
            phpVersion: "8.4",
            code: packagePhpCode('../', {
                exclude: [
                    '_mihani',
                    '.docker',
                    '.docs',
                    '.github',
                    'cdk',
                    'var',
                    '.dockerignore',
                    '.editorconfig',
                    '.env',
                    '.env.local',
                    '.gitignore',
                    '.php-cs-fixer.cache',
                    '.php-cs-fix.dist.php',
                    '.twig-cs-fixer.cache',
                    'CHANGELOG.md',
                    'compose.yaml',
                    'docker.env',
                    'docker.env.local',
                    'Dockerfile',
                    'Makefile',
                    'phpstan.dist.neon',
                    'README.md',
                ],
            }),
        });

        // Define the Lambda function URL resource
        const myFunctionUrl = myFunction.addFunctionUrl({
            authType: lambda.FunctionUrlAuthType.NONE,
        });

        // Define a CloudFormation output for your URL
        new cdk.CfnOutput(this, "myFunctionUrlOutput", {
            value: myFunctionUrl.url,
        });
    }
}
