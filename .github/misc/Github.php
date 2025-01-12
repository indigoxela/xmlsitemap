<?php

namespace PHP_CodeSniffer\Reports;

use PHP_CodeSniffer\Files\File;
/**
 *
 */
class Github implements Report {

    /**
     * Generate a partial report for a single processed file.
     *
     * Function should return TRUE if it printed or stored data about the file
     * and FALSE if it ignored the file. Returning TRUE indicates that the file and
     * its data should be counted in the grand totals.
     *
     * @param array $report
 *   Prepared report data.
     * @param \PHP_CodeSniffer\File $phpcsFile
 *   The file being reported on.
     * @param bool $showSources
 *   Show sources?
     * @param int $width
 *   Maximum allowed line width.
     *
     * @return bool
     */
  public function generateFileReport($report, File $phpcsFile, $showSources=FALSE, $width=80)
    {
    if ($report['errors'] === 0 && $report['warnings'] === 0) {
        // Nothing to print.
        return FALSE;
    }

    foreach ($report['messages'] as $line => $lineErrors) {
      foreach ($lineErrors as $column => $colErrors) {
        foreach ($colErrors as $error) {
          $type = strtolower($error['type']);
          $file = $report['filename'];
          $message = $error['message'];
          echo "::$type file=$file,line=$line,col=$column::$message" . PHP_EOL;
        }
      }
    }

      return TRUE;

  }//end generateFileReport()


    /**
     * Generates a GitHub Actions report.
     *
     * @param string $cachedData
 *   Any partial report data that was returned from
     *   generateFileReport during the run.
     * @param int $totalFiles
 *   Total number of files processed during the run.
     * @param int $totalErrors
 *   Total number of errors found during the run.
     * @param int $totalWarnings
 *   Total number of warnings found during the run.
     * @param int $totalFixable
 *   Total number of problems that can be fixed.
     * @param bool $showSources
 *   Show sources?
     * @param int $width
 *   Maximum allowed line width.
     * @param bool $interactive
 *   Are we running in interactive mode?
     * @param bool $toScreen
 *   Is the report being printed to screen?
     *
     * @return void
     */
  public function generate(
        $cachedData,
        $totalFiles,
        $totalErrors,
        $totalWarnings,
        $totalFixable,
        $showSources=FALSE,
        $width=80,
        $interactive=FALSE,
        $toScreen=TRUE
    ) {
      echo $cachedData;

  }//end generate()


}//end class
