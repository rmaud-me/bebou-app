#!/usr/bin/env node
import * as cdk from 'aws-cdk-lib';
import { BebouAppStack } from '../lib/bebou-app-stack';

const app = new cdk.App();
new BebouAppStack(app, 'BebouApp', {
    env: {
        region: 'eu-north-1',
        account: '314175685320'
    },
});
