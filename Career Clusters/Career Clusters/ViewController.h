//
//  ViewController.h
//  Career Clusters
//
//  Created by Henry Mound on 4/21/15.
//  Copyright (c) 2015 Henry Mound. All rights reserved.
//

#import <Cocoa/Cocoa.h>
#import <WebKit/WebKit.h>

@interface ViewController : NSViewController {
    IBOutlet WebView *webViewClusters;
    IBOutlet WebView *webViewMap;
}

@property (strong) IBOutlet WebView *webViewClusters;
@property (strong) IBOutlet WebView *webViewMap;

@end


