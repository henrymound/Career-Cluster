//
//  ViewController.m
//  Career Clusters
//
//  Created by Henry Mound on 4/21/15.
//  Copyright (c) 2015 Henry Mound. All rights reserved.
//

#import "ViewController.h"

@implementation ViewController
@synthesize webViewClusters = _webViewClusters, webViewMap = _webViewMap;

- (void)viewDidLoad {
    [super viewDidLoad];
    
    //For web clusters
    NSString *clusterUrlAddress = @"https://career-cluster-henrymound.c9.io/index.html";
    NSURL *clusterUrl = [NSURL URLWithString:clusterUrlAddress];
    NSURLRequest *clusterRequestObj = [NSURLRequest requestWithURL:clusterUrl];
    [[[_webViewClusters mainFrame] frameView] setAllowsScrolling:NO];
    [[_webViewClusters mainFrame] loadRequest:clusterRequestObj];
    
    //For web map
    NSString *mapUrlAddress = @"https://career-cluster-henrymound.c9.io/processSheet.php";
    NSURL *mapUrl = [NSURL URLWithString:mapUrlAddress];
    NSURLRequest *mapRequestObj = [NSURLRequest requestWithURL:mapUrl];
    [[_webViewMap mainFrame] loadRequest:mapRequestObj];

    // Do any additional setup after loading the view.
}



- (void)setRepresentedObject:(id)representedObject {
    [super setRepresentedObject:representedObject];

    // Update the view, if already loaded.
}


@end
